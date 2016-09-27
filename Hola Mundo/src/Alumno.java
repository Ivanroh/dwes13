
public class Alumno {

	private String nombre;
	private int edad;
	private static int cod;
	
	public Alumno() {}
	
	public Alumno(String nombre, int edad) {
		this.nombre = nombre;
		this.edad = edad;
		cod++;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public int getEdad() {
		return edad;
	}

	public void setEdad(int edad) {
		this.edad = edad;
	}

	public int getCod() {
		return cod;
	}


	@Override
	public String toString() {
		return "Alumno [nombre=" + nombre + ", edad=" + edad + ", cod=" + cod + "]";
	}
	
	
	
}
