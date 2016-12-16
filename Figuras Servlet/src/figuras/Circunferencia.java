package figuras;

public class Circunferencia extends Figura{

	private double radio;

	public Circunferencia(String titulo,Color color,double radio) {
		super(titulo, color);
		this.radio = radio;
	}

	public double getRadio() {
	return radio;
	}

	public void setRadio(double radio) {
	this.radio = radio;
	}

	public double area(){
	return Math.PI*Math.pow(radio, 2);
	}

	public double perimetro(){
	return 2*radio*Math.PI;
	}


	@Override
	public String toString() {
	return "Circunferencia [radio=" + radio + "]";
	}

}
