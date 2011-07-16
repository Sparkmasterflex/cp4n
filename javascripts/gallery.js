// ----------------------------------------------------------------------------
//
//    AjaxPopup v1.0
//    by Eric Salczyns and Keith Raymond
//    Last Modification: 8/26/10
//
//    For SolidWebsiteS.com
//    http://www.solidwebsites.com
//
//    Licensed under the Creative Commons Attribution 2.5 License - http://creativecommons.org/licenses/by/2.5/
//      - Free for use in both personal and commercial projects
//      - Attribution requires leaving author name, author link, and the license info intact.
//
// ----------------------------------------------------------------------------

var Gallery = Class.create({
  initialize: function(options) {
    this.link = options.el; // link which launches popup
    this.href = this.link ? this.link.readAttribute('href') : options.href;  // url to load as the contents of the popup
    this.content = options.content;
    this.images = options.images;
    this.onComplete = options.onComplete ? this.evalCallback(options.onComplete) : null;  // optional callback to run after the popup has loaded

    if(this.link) {
      this.link.observe('click', function(e) {
        e.stop();
        this.launchPopup();
      }.bind(this));
    } else {
      this.launchPopup();
    }
  },

  launchPopup: function() {
    this.current = this.link;
    this.insertOverlay();
    this.updateWindow();
  },

  // creates and inserts the required DOM elements
  insertOverlay: function() {
    this.overlay = new Element('div', {id: 'gallery-overlay'}).setStyle({opacity: 0.01});
    this.window = new Element('div', {id: 'gallery-window'});
    this.close_link = new Element('a', {id: 'gallery-close', "class": "gallery-popup", href: "#close"});

    // temporarily holds the content to be loaded. necessary to get the size of the content window
    this.temp = new Element('div', {id: 'gallery-temp'}).setStyle({opacity: 0.01});

    // insert all of the elements into the DOM
    this.overlay.insert(this.temp);
    this.overlay.insert(this.window);
    $(document.body).insert(this.overlay);

    // center the empty popup window
    pos = centerPosition(this.window);
    this.window.setStyle({ top: pos.top + "px", left: pos.left + "px" });

    // fade in the overlay and popup window
    this.overlay.fade({duration: 0.15, from: 0.01, to: 1});

    // add an observer to the overlay div to close the popup window
    this.overlay.observe('click', function(e) {
      var el = Event.element(e);
      if (el.identify() == this.overlay.identify()) this.closePopup();
    }.bind(this));
  },

  // update the content of the popup window (ie: display error message). Also reloads the method for onComplete.
  updateContent:function(content) {
    this.content = content;
    this.temp = new Element('div', {id: 'gallery-temp'}).setStyle({opacity: 0.01});
    this.overlay.insert(this.temp);

    this.window.descendants().invoke('hide');
    this.window.setStyle({background: '#fff url(/images/stylesheets/ajax-loader.gif) no-repeat center center'});
    this.updateWindow();
    this.content = "";
  },

  // updates the popup content window using the href from the link
  updateWindow: function() {
    if(this.content) {
      this.temp.update(this.content);
      this.showPopup();
    } else {
      // update the temp div so we can calculate the new popup window size
      var imgTag = new Element('img', {src: this.current.readAttribute('href'), title: this.current.readAttribute('title')}),
          imgWidth = this.current.readAttribute('value').split('-')[0],
          imgHeight = this.current.readAttribute('value').split('-')[1];

      var next = this.current.up('li').next() ? this.current.up('li').next().down('a') : null;
          previous = this.current.up('li').previous() ? this.current.up('li').previous().down('a') : null;

      if(previous) var prevLink = new Element('a', {id: 'previous-img', href: previous.readAttribute('href'), 'class': 'next-prev'}).insert('Previous Image');
      if(next) var nextLink = new Element('a', {id: 'next-img', href: next.readAttribute('href'), 'class': 'next-prev'}).insert('Next Image');
      var nextPrev = new Element('div', {id: 'next-prev'}),
          title = this.current.readAttribute('title') == "" ? this.images.indexOf(this.current) + " of " + this.images.size() : this.current.readAttribute('title');
          imgTitle = new Element('p').insert(title);

      this.dimensions = this.resizeImage(imgWidth, imgHeight);

      imgTag.writeAttribute({
        width: this.dimensions['width'],
        height: this.dimensions['height']
      });

      nextPrev.insert(prevLink);
      nextPrev.insert(imgTitle);
      nextPrev.insert(nextLink);
      this.temp.update(imgTag);
      this.temp.insert(nextPrev);
      this.showPopup();
    }
  },

  changeImage: function(e) {
    e.stop();
    var el = Event.element(e),
        imgTag = new Element('img', {src: el.readAttribute('href')});
    this.current = el.identify() == 'next-img' ?
               this.current.up('li').next().down('a') :
               this.current.up('li').previous().down('a');
    this.temp = new Element('div', {id: 'gallery-temp'}).setStyle({opacity: 0.01});
    this.overlay.insert(this.temp);
    this.updateWindow();
  },

  showPopup: function() {
    this.window.setStyle({backgroundImage: 'none'});  // hide the loading image

      // calculate the new size and center position of the temp div
      var pos = centerPosition(this.temp);

      // scale the content window to the correct size
      if(this.window.down('img')) new Effect.Fade(this.window.down('img'), {duration: 0.25});
      new Effect.Parallel([
        new Effect.Morph(this.window, {style: {height: (pos.height - 40) + "px", width: pos.width + "px"}}),
        new Effect.Move(this.window, {x: pos.left - 20, y: pos.top - 20, mode: 'absolute'})
      ], {duration: 0.5, afterFinish: function(effect) {
          // update the popup window with the content from temp and remove temp from the DOM

          this.window.update(this.temp.innerHTML);
          $$('.next-prev').invoke('observe', 'click', this.changeImage.bindAsEventListener(this));
          //this.window.observe('click', this.closePopup.bindAsEventListener(this));

          this.temp.remove();

          // run the optional user-specified onComplete callback
          if(this.onComplete)
            this.onComplete();

          // add observers to all close-ajax-popup links
          this.window.insert(this.close_link);
          this.close_link.show();
          this.observeCloseLinks();
      }.bind(this)});
  },

  closePopup: function(afterFinish) {
    new Effect.DropOut(this.window, {duration: 0.15, afterFinish: function(effect){
      this.overlay.fade({duration: 0.15, from: 1, to: 0, afterFinish: function(effect) {
        this.overlay.remove();
        if (afterFinish) afterFinish();
      }.bind(this)})
    }.bind(this)});
  },

  observeCloseLinks: function() {
    this.window.select('a.gallery-popup').invoke('observe', 'click', function(e) {
      e.stop();
      this.closePopup();
    }.bind(this));
  },

  resizeImage: function(w, h) {
    var maxW = 1000, maxH = 700,
    d = (parseInt(w) > parseInt(h)) ?
      { width: maxW, height: (h * (maxW / w)).round() } :
      { width: (w * (maxH / h)).round(), height: maxH };
    return d;
  },

  // closes the popup and removes it from the DOM
  closePopup: function(afterFinish) {
    new Effect.DropOut(this.window, {duration: 0.15, afterFinish: function(effect){
      this.overlay.fade({duration: 0.15, from: 1, to: 0, afterFinish: function(effect) {
        this.overlay.remove();
        if (afterFinish) afterFinish();
      }.bind(this)})
    }.bind(this)});
  },

  evalCallback: function(callback) {
    return (callback && typeof(callback) == 'function') ? callback :
    (eval('typeof(' + callback + ')') == 'function') ? eval(callback) :
    (eval('typeof(this.' + callback + ')') == 'function') ? eval('this.' + callback) : ""
  }
});

AjaxPopup.Window = Class.create(AjaxPopup, {
  initialize: function(options) {
    this.overlay = $('gallery-overlay');
    this.window = $('gallery-window');
  },

  close: function() {
    this.closePopup();
  },

  update: function(options) {
    this.onComplete = options.onComplete ? this.evalCallback(options.onComplete) : null;  // optional callback to run after the popup has loaded
    this.updateContent(options.content);
  }
});

AjaxPopup.closeWindow = function() {
  new AjaxPopup.Window().close();
}

AjaxPopup.updateWindow = function(options) {
  new AjaxPopup.Window().update(options)
}

// gets the dimensions of the visible portion of the window as well as the scroll offsets
// returns results as key/value pairs of an object
function getPageSize(){
  var dim = document.viewport.getDimensions(),
      scroll = document.viewport.getScrollOffsets();

  return {width: dim.width, height: dim.height, left: scroll.left, top: scroll.top};
}

// calculates the left and top values for centering the passed element on the screen
// returns results as key/value pairs of an object
function centerPosition(el) {
  var pageSize = getPageSize(),
      dim = el.getDimensions(),
      offsets = el.cumulativeOffset(),
      d = getImgSize(dim),

      top = (offsets.top + (pageSize.height - d.height) / 2),
      left = (offsets.left + (pageSize.width - d.width) / 2),
      right = (offsets.left + (pageSize.width + d.width) / 2);

  return {width: dim.width, height: dim.height, top: top, left: left, right: right}
}

  function getImgSize(dim) {
    var maxW = 1000, maxH = 700,
    d = (dim.width > dim.height) ?
      { width: maxW, height: (dim.height * (dim.width / maxW)) } :
      { width: (dim.width * (dim.height / maxH)), height: maxH };

    return d;
  }