import java.util.ArrayList;

public class Curso {

	private ArrayList<Alumno> alumnos;
	private int numAlumnos;
	
	public Curso() {
		alumnos=new ArrayList<Alumno>();
		numAlumnos = alumnos.size();
	}

	public ArrayList<Alumno> getAlumnos() {
		return alumnos;
	}

	public void setAlumnos(ArrayList<Alumno> alumnos) {
		this.alumnos = alumnos;
	}

	public int getNumAlumnos() {
		return numAlumnos;
	}

	public void setNumAlumnos(int numAlumnos) {
		this.numAlumnos = numAlumnos;
	}

	@Override
	public String toString() {
		return "Curso [alumnos=" + alumnos + ", numAlumnos=" + numAlumnos + "]";
	}
	
	public void altaAlumno(){
		System.out.println("Nombre");
		String nombre="Ivan";
		System.out.println("Edad");
		int edad=21;
		
		Alumno aux=new Alumno(nombre, edad);
		
		alumnos.add(aux);
		
	}
	
	public void visualizarAlumnos(){
		System.out.println("Alumnos: ");
		for (int i = 0; i < alumnos.size(); i++) {
			System.out.println("Nombre "+alumnos.get(i).getNombre()+" "+"Edad "+alumnos.get(i).getEdad());
		}
		
	}
	
}
