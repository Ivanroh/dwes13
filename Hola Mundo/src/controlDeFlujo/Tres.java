package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class Tres {

	public static void main(String[] args) {
		/*3) Ir pidiendo por teclado una serie de n�meros enteros e irlos sumando.
		Se deja de pedir n�meros al usuario cuando la cantidad supera el valor 50.
		Escribir por pantalla la suma de todos los n�meros introducidos.*/
	
		System.out.println("Introduzca una serie de n�meros");
		Scanner sc=new Scanner(System.in);
		int num,suma=0;
		
		try {
			
			do{
				num=sc.nextInt();
				suma+=num;
				
			}
			while(suma<50);
			
			System.out.println("La suma supera 50: Suma de la serie de n�meros "+suma);
			
		} catch (InputMismatchException e) {
			System.out.println("Error");
			sc.close();
		}
		
		
		
	}

}
