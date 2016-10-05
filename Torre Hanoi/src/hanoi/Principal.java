package hanoi;

import java.util.Scanner;

public class Principal {

	public static void main(String[] args) {
		Scanner teclado=new Scanner(System.in);
		System.out.println("Introduzca el diametro del disco");
		int diametro=teclado.nextInt();
		
		Disco disc=new Disco(diametro);
		
		disc.dibujarDisco(disc.getDiametro());
		
		teclado.close();
	}

}
