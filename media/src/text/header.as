package src.text {
  import flash.display.MovieClip;
  import flash.text.TextField;
  import flash.text.TextFormat;
  import flash.text.TextFieldAutoSize;
  import flash.text.AntiAliasType;
  import src.common.gradient;
  import src.common.triangle;
  import com.greensock.*
  import com.greensock.easing.*
  import com.greensock.plugins.TweenPlugin;
  import com.greensock.plugins.DropShadowFilterPlugin;
  TweenPlugin.activate([DropShadowFilterPlugin]);  
  
  public class header extends MovieClip
  {
  	/*---- Classes ----*/
  	private var txt:TextField;
  	private var tF:TextFormat = new TextFormat();
  	public var txtBG:gradient;
  	public var tri:triangle;
  	
  	/*---- Numbers ----*/
  	private var triX:Number;
  	
  	/*---- Boolean ----*/
  	private var open:Boolean = false;
  	
  	/*---- MovieClips and Strings ----*/
  	
	public function header(text) {
	  txt = new TextField();
	  textFormat();
	  txt.autoSize = TextFieldAutoSize.LEFT;
	  txt.text = text;
	  txt.selectable = false;
	  txt.x = 20;
	  addChild(txt);
	  txt.cacheAsBitmap = true;
	  createTxtBG();
	  txtBG.cacheAsBitmap = true;
	  txtBG.mask = txt;
	  TweenLite.to(txtBG, .1, {dropShadowFilter:{blurX:.5, blurY:.5, distance:.5, alpha:0.6, inner:true}});
	  addTriangle();
	}
	
	private function textFormat() {
	  tF.font = "Impact";
      tF.size = 30;
      tF.color = 0x222222;
      tF.letterSpacing = 3;
      tF.kerning = true;
      txt.antiAliasType = AntiAliasType.ADVANCED;
      txt.defaultTextFormat = tF; 
	}
	
	public function createTxtBG() {
	  txtBG = new gradient(
	                 ['none', 'none'], 'linear', [0xc7c7c7, 0xe1e1e1],
	                 [1, 1], [0, 255], txt.width, txt.height,
                     (3 * Math.PI) / 2, [txt.width, txt.height], 'rectangle'
	               );
	  txtBG.x = txt.x;
	  txtBG.y = txt.y;
	  addChild(txtBG);
	}
	
	public function addTriangle() {
	  tri = new triangle();
	  tri.y = 12;
	  triX = tri.x;
	  addChild(tri);
	  TweenLite.to(tri, .1, {dropShadowFilter:{blurX:.5, blurY:.5, distance:.5, alpha:0.6, inner:true}});
	}
	
	public function triangleRotate() {
	  if(open) {
	  	TweenLite.to(tri, .5, { x:triX, rotation:0});
	  	open = false;
      } else {
      	TweenLite.to(tri, .5, { x:11, rotation:90});
      	open = true;
      }	
	}	
  }
}