package src.components {
  import flash.display.MovieClip;
  import src.text.header;
  import src.components.boxController;
  import src.components.LearnMore;
  import com.greensock.*
  import com.greensock.easing.*
  import com.greensock.plugins.TweenPlugin;
  import com.greensock.plugins.DropShadowFilterPlugin;
  TweenPlugin.activate([DropShadowFilterPlugin]);
	
  public class sectionController extends MovieClip {
  	/*---- Classes ----*/
  	public var bController:boxController;
  	public var hController:header;
  	public var learn:LearnMore;
  	
	public function sectionController(txt) {
	  hController = new header(txt);
      addChild(hController);
      TweenLite.to(hController, .1, {dropShadowFilter:{blurX:1.5, blurY:1.5, distance:1.5, alpha:0.6}});
      addSectionBox(hController.y);
	}
    
    private function addSectionBox(posY) {
      bController = new boxController();
      bController.y = posY + 40;
      addChild(bController);
    }
    
    public function openSection() {
      hController.triangleRotate();
      bController.open();
      addLearnMore();
    }
    
    public function closeSection() {
      hController.triangleRotate();
      bController.close();
      TweenLite.to(learn, .5, {y:45, onComplete: removeLearn});
    }
    
    private function addLearnMore() {
      learn = new LearnMore('hello');
      learn.y = bController.y + 20;
      learn.x = bController.width - learn.width;
      addChild(learn);
      learn.buttonMode = true;
      TweenLite.to(learn, .5, {y:255})
    }
    
    private function removeLearn() {
      removeChild(learn);
    }
  }
}