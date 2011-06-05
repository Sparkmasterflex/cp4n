package src {
  import flash.display.MovieClip;
  import flash.events.*;
  import src.components.sectionController;
  import com.greensock.*
  import com.greensock.easing.*
  
  public class neb_sidebar extends MovieClip {
  	/*---- Classes ----*/
  	public var section:sectionController;
  	
  	/*---- Array ----*/
  	public var sections:Array = new Array();
    public var headers:Array = new Array('COUNTDOWN', 'SCHEDULE', 'NEWS', 'MEMBERSHIP');
    private var link1Pos:Array = new Array(20, 315, 375, 435);
    private var link2Pos:Array = new Array(20, 80, 375, 435);
    private var link3Pos:Array = new Array(20, 80, 140, 435);
    private var link4Pos:Array = new Array(20, 80, 140, 200);
    
    /*---- MovieClips and Strings ----*/
    public var openedLink;

	public function neb_sidebar(){
	  for(var i:uint = 0; i < headers.length; i++) {
	    section = new sectionController(headers[i]);
	    section.x = 10;
        section.y = 20 + (60 * i);
        section.name = headers[i];
	    addChild(section);
	    section.addEventListener(MouseEvent.CLICK, toggleSection);
	    sections.push(section);
	  }
	  openFirst();
	}
	
	private function openFirst() {
	  sections[0].openSection();
	  tweenPositions(link1Pos);
	  openedLink = sections[0];
	  openedLink.removeEventListener(MouseEvent.CLICK, toggleSection);
	}
	
	private function toggleSection(event:MouseEvent) {
	  var clicked = event.currentTarget,
	      index = sections.indexOf(clicked),
	      arr = findLinkPos(index);

	  openedLink.addEventListener(MouseEvent.CLICK, toggleSection);
	  clicked.removeEventListener(MouseEvent.CLICK, toggleSection);
	      
	  openedLink.closeSection();
	  clicked.openSection();
	  tweenPositions(arr);
	  openedLink = clicked;
	}
	
	public function tweenPositions(arr) {
	  for(var i:uint = 0; i < sections.length; i++) {
        TweenLite.to(sections[i], .5, {y:arr[i]});
      }
	}
	
	private function findLinkPos(i):Array {
      var arr:Array;
      switch(i) {
        case 0:
          arr = link1Pos;
          break;
        case 1:
          arr = link2Pos;
          break;
        case 2:
          arr = link3Pos;
          break;
        case 3:
          arr = link4Pos;
          break;
      }
      
      return arr;
    }
  }	
}
