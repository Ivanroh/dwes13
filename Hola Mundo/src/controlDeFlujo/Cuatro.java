package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class Cuatro {

	public static void main(String[] args) {
		
		/*4) Pedir al usuario un n�mero del 1 al 10. Si se equivoca o introduce un 
		valor inv�lido (por ejemplo una letra), se le volver� a solicitar que 
		introduzca el n�mero. todo dentro del do while*/
		
		
		Scanner sc=new Scanner(System.in);
		boolean valido=true;
		int num=0;
		do{
			try {
				System.out.println("Introduzca un n�mero del 1 al 10");
				num=sc.nextInt();		
				if ( num>0 && num<=10) {
					System.out.println("N�mero v�lido");
					valido=true;
				}
				else {
					System.out.println("N�mero no v�lido\n");
					valido=false;
				}
				
			} catch (InputMismatchException e) {
				System.out.println("Error no es un n�mero, introduzca un n�mero\n");
				valido=false;
				sc=new Scanner(System.in);
			}
		} while(!valido);
		
		sc.close();

	}

}
