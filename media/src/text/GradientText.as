package src.text {
  import flash.display.MovieClip;
  import flash.text.TextField;
  import flash.text.TextFormat;
  import flash.text.TextFieldAutoSize;
  import flash.text.AntiAliasType;
  import src.common.gradient;
  
  /**
   * ...
   * @author Keith
   */
  public class GradientText extends MovieClip {
	public var txt:TextField;
	private var tF:TextFormat;
	private var txtBG:gradient;
	  
	public function GradientText(content, textArr, gradientArr) {
	  txt = new TextField();
	  textFormat(textArr);
	  txt.text = content;
	  addChild(txt);
	  txt.selectable = false;
	  txt.cacheAsBitmap = true;
	  createTxtBG(gradientArr);
	  txtBG.cacheAsBitmap = true;
	  txtBG.mask = txt;
	}
	
	private function textFormat(arr) {
	  tF = new TextFormat();
	  tF.font = arr[0];
      tF.size = arr[1];
      tF.color = 0x000000;
      tF.letterSpacing = arr[2];
      tF.kerning = true;
      txt.antiAliasType = AntiAliasType.ADVANCED;
	  txt.autoSize = TextFieldAutoSize.LEFT;
      txt.defaultTextFormat = tF; 
	}
	
	public function createTxtBG(arr) {
	  txtBG = new gradient(
		   ['none', 'none'], 'linear', arr[0],
		   arr[1], arr[2], txt.width, txt.height,
		   (3 * Math.PI) / 2, [txt.width, txt.height], 'rectangle'
		 );
	  txtBG.x = txt.x;
	  txtBG.y = txt.y;
	  addChild(txtBG);
	}
  }
}