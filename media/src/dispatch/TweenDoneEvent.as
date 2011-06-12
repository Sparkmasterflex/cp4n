package src.dispatch {
  import flash.display.MovieClip;
  import flash.events.Event;
  
  /**
   * ...
   * @author Keith
   */
  public class TweenDoneEvent extends Event {
	public static const DONE:String = 'all done';
	public var eventTarget:MovieClip;
	public var action:String;
	public var something:String = "Hello World";
				   
	public function TweenDoneEvent(type:String, mc, a) { 
	  super(type, true);
	  eventTarget = mc;
	  action = a;
	} 
	
	public override function clone():Event {
	  return new TweenDoneEvent(type, eventTarget, action);
	} 
	
	public override function toString():String { 
	  return formatToString("TweenDoneEvent", "type", "bubbles", "cancelable", "eventPhase"); 
	}
  }
}