package src.components {
  import flash.display.MovieClip;
  import flash.events.MouseEvent;
  import flash.net.URLRequest;
  import flash.net.navigateToURL;
  
  import src.text.textFields;

  public class LinkTo extends MovieClip {
	private var toURL:String;
	
	public function LinkTo(text, url) {
	  var link:textFields = new textFields(11, 0x000000, 'Arial', 'LEFT');
	  toURL = url;
	  
	  link.text = text;
	  addChild(link);
	  this.addEventListener(MouseEvent.CLICK, navigateTo);
	}
	
	private function navigateTo(event:MouseEvent) {
	  var request:URLRequest = new URLRequest(toURL);
	  navigateToURL(request);
	}
  }
}