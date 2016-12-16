package figuras;

public class Elipse extends Figura{
	private double radioX;
	private double radioY;

	public Elipse(String titulo,Color color,double radioX, double radioY) {
		super(titulo, color);
		this.radioX = radioX;
		this.radioY = radioY;
	}

	public double getRadioX() {
	  return radioX;
	}

	public void setRadioX(double base) {
	  this.radioX = base;
	}

	public double getRadioY() {
	  return radioY;
	}

	public void setRadioY(double altura) {
	  this.radioY = altura;
	}

	public double area(){
		return (radioX*radioY)/2;
	}

	public double perimetro(){
	  return radioX+radioY+Math.sqrt(Math.pow(radioX, 2)+ Math.pow(radioY, 2));
	}


	@Override
	public String toString() {
	  return "Triangulo [base=" + radioX + ", altura=" + radioY + "]";
	}



}
