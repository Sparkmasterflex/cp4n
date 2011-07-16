/**
*
*  Add picasa gallery to your blog or website
*  http://www.webtoolkit.info/
*
**/
var picasa = {

	galleries: 0,

	gallery: function (galleryObjectId, galleryObjectName, settings) {
		this.galleryObjectId = galleryObjectId;
		this.galleryObjectName = galleryObjectName;
		this.containerId = settings.containerId;
		this.userName = settings.userName;
		this.albumName = settings.albumName;
		this.imageSize = settings.imageSize;
    if(settings.maxImgs) this.maxImgs = settings.maxImgs;
		this.itemsArray = [];

		this.setup = function (data) {
      if(this.maxImgs) {
        for(i = 0; i < this.maxImgs; i++) {
          imgIndex = (Math.random() * data.feed.entry.length).round();
          this.itemsArray[i] = data.feed.entry[imgIndex];
        }
      } else {
        this.itemsArray = data.feed.entry;
      }

      var portUL = new Element('ul', {id: 'thumbs', 'class': 'gallery'}),
          imageLinks = new Array();
      this.itemsArray.each(function(item) {
				var imgTag = new Element('img', {src: item.media$group.media$thumbnail[0].url}),
            link = new Element('a', {href: item.media$group.media$content[0].url, title: item.media$group.media$description.$t, value: item.media$group.media$content[0].width + "-" + item.media$group.media$content[0].height}),
            portLI = new Element('li');

        if(this.maxImgs) {
          portLI.insert(imgTag);
        } else {
          link.insert(imgTag);
          portLI.insert(link);
          imageLinks.push(link);
        }

        portUL.insert(portLI);
			}.bind(this));

      $(this.containerId).insert(portUL);
      picasa.observeThumbnails(imageLinks);
		};

  },

	load: function (settings) {
		var galleryObjectId = picasa.galleries++;
		var galleryObjectName = 'picasa.gallery' + galleryObjectId;
		var galleryObject = eval(galleryObjectName + ' = new picasa.gallery(galleryObjectId, galleryObjectName, settings)');

		scriptLoader.load([
			'http://picasaweb.google.com/data/feed/api/user/' + galleryObject.userName + '/album/' + galleryObject.albumName + '?alt=json-in-script&callback=' + galleryObjectName + '.setup&kind=photo&thumbsize=' + galleryObject.imageSize
		]);
	},

  observeThumbnails: function(links) {
    links.each(function(el) { new Gallery({el: el, onComplete: '', images: links}); });
  }
}