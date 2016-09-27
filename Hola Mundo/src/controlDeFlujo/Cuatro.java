package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class Cuatro {

	public static void main(String[] args) {
		
		/*4) Pedir al usuario un número del 1 al 10. Si se equivoca o introduce un 
		valor inválido (por ejemplo una letra), se le volverá a solicitar que 
		introduzca el número. todo dentro del do while*/
		
		
		Scanner sc=new Scanner(System.in);
		boolean valido=true;
		int num=0;
		do{
			try {
				System.out.println("Introduzca un número del 1 al 10");
				num=sc.nextInt();		
				if ( num>0 && num<=10) {
					System.out.println("Número válido");
					valido=true;
				}
				else {
					System.out.println("Número no válido\n");
					valido=false;
				}
				
			} catch (InputMismatchException e) {
				System.out.println("Error no es un número, introduzca un número\n");
				valido=false;
				sc=new Scanner(System.in);
			}
		} while(!valido);
		
		sc.close();

	}

}
