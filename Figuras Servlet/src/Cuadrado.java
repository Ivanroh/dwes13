public class Cuadrado extends Figura{

	private double lado;

	public Cuadrado(String titulo,Color color,double lado) {
		super(titulo, color);
		this.lado = lado;
	}

	public double getLado() {
		return lado;
	}

	public void setLado(double lado) {
		this.lado = lado;
	}

	public double area(){
		return lado*lado;
	}

	public double perimetro(){
		return lado*4;
	}

	@Override
	public String toString() {
		return super.toString()+" Cuadrado [lado=" + lado + "]"+ " Area: "+area()+" Perimetro: "+perimetro();
	}
}