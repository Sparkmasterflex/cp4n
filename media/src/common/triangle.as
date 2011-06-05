package src.common {
  import flash.display.Sprite;
  import flash.geom.Matrix;
  import flash.display.GradientType;
  import flash.display.SpreadMethod;
  
  public class triangle extends Sprite {
    
    public function triangle(){
	  var matr:Matrix = new Matrix();
      var sprMethod:String = SpreadMethod.PAD;
      
      matr.createGradientBox(18, 14, (3 * Math.PI), 0, 0);
	  graphics.beginGradientFill(GradientType.LINEAR, [0xc7c7c7, 0xe1e1e1], [1, 1], [0, 255], matr, sprMethod);
	  graphics.moveTo(0, 0);
	  graphics.lineTo(18, 7);
	  graphics.lineTo(0, 18);
	  graphics.lineTo(0, 0);
	  graphics.endFill();
    }	
  }
}