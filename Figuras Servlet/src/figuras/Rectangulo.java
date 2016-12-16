package figuras;

public class Rectangulo extends Figura{
	private double base;
	private double altura;

	public Rectangulo(String titulo,Color color,double base, double altura) {
		super(titulo, color);
		this.base = base;
		this.altura = altura;
	}

	public double getBase() {
	  return base;
	}

	public void setBase(double base) {
	  this.base = base;
	}

	public double getAltura() {
	  return altura;
	}

	public void setAltura(double altura) {
	  this.altura = altura;
	}

	public double area(){
		return (base*altura)/2;
	}

	public double perimetro(){
	  return base+altura+Math.sqrt(Math.pow(base, 2)+ Math.pow(altura, 2));
	}


	@Override
	public String toString() {
	  return "Triangulo [base=" + base + ", altura=" + altura + "]";
	}



}
