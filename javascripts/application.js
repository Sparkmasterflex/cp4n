document.observe('dom:loaded', function(){
  embedMovie();
  var images = $$('ul#slideImages li');
  if($('slideshow')) $('slideshow').observe('dom:loaded', new SlideShow({slides: images}));
  
  $$('a[rel="external"]').invoke('writeAttribute', 'target', '_blank');
});


function embedMovie() {
  var flashvars = {};

  var params = {
    'allowfullscreen':    'false',
    'allowscriptaccess':  'always',
    'allowfullscreen':	  'false',
    'wmode':              'transparent'
  };

  var attributes = {
    'id':                 'sidebar',
    'name':               'sidebar'
  };

  swfobject.embedSWF('/media/neb_sidebar.swf', 'flashContent', '295', '505', '9', 'false', flashvars, params, attributes);
}

