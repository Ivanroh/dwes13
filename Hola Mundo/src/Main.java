//import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		
		Curso curso=new Curso();
		//Scanner sc=new Scanner(System.in);
//		System.out.println("INt algo");
//		int i=sc.nextInt();
//		System.out.println(i);
//		System.out.println("Algo escrito");
//		String algo=sc.nextLine();
//		String todo=" ";
//		
//		for (int i = 0; i < algo.length(); i++) {
//			todo+=algo;
//		}
//		
//		System.out.println(todo);
		
		
		do{	
		System.out.println("Alta alumno");
		curso.altaAlumno();
		System.out.println("Ver todos los alumnos");
		curso.visualizarAlumnos();
		}
		while(1==2);
	}

}
