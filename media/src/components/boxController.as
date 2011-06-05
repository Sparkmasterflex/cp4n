package src.components {
  import flash.display.MovieClip;
  import src.common.gradient;
  import com.greensock.*
  import com.greensock.easing.*
	
  public class boxController extends MovieClip {
	public var box:gradient;
	
	public function boxController(){
	  box = new gradient(
	      ['none', 'none'], 'linear', [0xc7c7c7, 0xe1e1e1],
	      [1, 1], [0, 255], 275, 3,
	      (3 * Math.PI) / 2, [275, 3], 'rectangle'
	    );
      addChild(box);
	}
	
	public function tweenPosition(pos) {
	  TweenLite.to(this, .5, {y: pos + 40});
	}
	
	public function open() {
      TweenLite.to(box, .5, { height: 215 });
    }
	
	public function close() {
	  TweenLite.to(box, .5, { height: 3 });
	}
  }
}