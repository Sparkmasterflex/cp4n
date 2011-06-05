package src.components {
  import flash.display.MovieClip;
  import flash.display.Sprite;
  import flash.events.MouseEvent;
  import flash.text.TextField;
  import flash.text.TextFormat;
  import flash.text.TextFieldAutoSize;
  import flash.text.AntiAliasType;
  
  public class LearnMore extends MovieClip {
  	private var txt:TextField;
  	private var tF:TextFormat = new TextFormat();
  	private var hit:Sprite;
    
    public function LearnMore(url){
      hit = new Sprite();
      hit.graphics.beginFill(0xffffff, 0);
      hit.graphics.drawRect(0, 0, 75, 20);
      hit.graphics.endFill();
      addChild(hit);
	  txt = new TextField();
	  textFormat();
      txt.autoSize = TextFieldAutoSize.LEFT;
	  txt.text = "learn more";
	  addChild(txt);
	  txt.selectable = false;
	  addEventListener(MouseEvent.CLICK, navigateTo);
	}
	
	private function textFormat() {
      tF.font = "Arial";
      tF.size = 14;
      tF.color = 0xffffff;
      tF.kerning = true;
      tF.underline = true;
      txt.antiAliasType = AntiAliasType.ADVANCED;
      txt.defaultTextFormat = tF; 
    }
    
    private function navigateTo(event:MouseEvent) {
      trace('hello');
    }
  }
}