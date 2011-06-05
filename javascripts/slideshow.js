var SlideShow = Class.create({
  initialize: function(options) {
    this.parent = $('slideshow');
    this.slides = options.slides;
    this.captions = [];
    this.count = this.slides.length;
    this.slides.each( function(img) { img.setStyle({display: 'none'}); });

    this.insertCaption();
    this.createSlideLinks();
    this.showFirstSlide();
  },

  insertCaption: function() {
    this.captionDiv = new Element('div', {'class': 'caption'});
    var paragraphTag = new Element('p'),
        firstCaption = this.slides[0].down('img').readAttribute('title');
//    this.slides.each( function(img){
//      this.captions.push(img.down('img').readAttribute('title'));
//    }.bind(this));
    
    paragraphTag.insert(firstCaption);
    this.captionDiv.insert(paragraphTag);
    this.parent.insert(this.captionDiv);
  },

  createSlideLinks: function() {
    var i = 0;

    this.ulSlide = new Element('ul', {id: 'slideLinks', 'class': 'hidden'});
    this.slides.each( function(img) {
      img.writeAttribute({id: 'slide_' + i})
      var link = new Element('a', {href: '#slide_' + i}),
          li = new Element('li', {'class': 'slide_' + i});

      li.insert(link);
      this.ulSlide.insert(li);
      i++;
    }.bind(this));
    this.captionDiv.insert(this.ulSlide);
    this.ulSlide.down('li').addClassName('current');
    this.ulSlide.select('li a').invoke('observe', 'click', this.gotoSlide.bindAsEventListener(this));
  },

  showFirstSlide: function() {
    var first = this.slides.first().writeAttribute('class', 'current');
    first.setStyle({display: 'block'});
    this.startTimer();
  },

  gotoNextSlide: function() {
    var current = $('slideshow').down('ul#slideImages li.current'),
        slideOn = parseInt(current.readAttribute('id').gsub('slide_', '')),
        nextOn = slideOn == (this.count - 1) ? 0 : slideOn + 1,
        nextSlide = this.slides[nextOn];

    new Effect.Fade(current, {duration: '.5'});
    new Effect.Appear(nextSlide, {duration: '.5', queue: 'end'});
    current.removeClassName('current');
    nextSlide.addClassName('current');

    this.ulSlide.down('li.current').removeClassName('current')
    this.ulSlide.down('li.slide_' + nextOn).addClassName('current');
    this.changeCaption(nextSlide);
  },

  gotoSlide: function(e) {
    e.stop();
    this.timer.stop();
    var el = Event.element(e),
        href = el.readAttribute('href').gsub('#', ''),
        selected = $(href),
        current = $$('li.current').first(),
        ul = el.up('ul'),
        newCurrent = 'li.' + href;
        
    if(selected != current) {
      new Effect.Fade(current, {duration: '.5'});
      new Effect.Appear(selected, {
        duration: '.5',
        queue: 'end'
      });
      current.removeClassName('current');
      selected.addClassName('current');
      ul.down('li.current').removeClassName('current')
      ul.down(newCurrent).addClassName('current');
      this.changeCaption(selected);
      this.startDelayTimer();
    }
  },

  changeCaption: function(slide) {
    this.captionDiv.down('p').update(slide.down('img').readAttribute('title'));
  },
  
  startTimer: function() {
    if(this.delay) this.delay.stop();
    this.timer = new PeriodicalExecuter(function(e) {
      this.gotoNextSlide();
    }.bind(this), 6);
  },

  stopTimer: function() {
    this.timer.stop();
  },

  startDelayTimer: function() {
  	if(this.delay) this.delay.stop();
    this.delay = new PeriodicalExecuter(function(e){
      this.startTimer();
    }.bind(this), 3);
  }
});