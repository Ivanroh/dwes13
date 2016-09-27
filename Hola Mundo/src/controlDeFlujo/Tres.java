package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class Tres {

	public static void main(String[] args) {
		/*3) Ir pidiendo por teclado una serie de números enteros e irlos sumando.
		Se deja de pedir números al usuario cuando la cantidad supera el valor 50.
		Escribir por pantalla la suma de todos los números introducidos.*/
	
		System.out.println("Introduzca una serie de números");
		Scanner sc=new Scanner(System.in);
		int num,suma=0;
		
		try {
			
			do{
				num=sc.nextInt();
				suma+=num;
				
			}
			while(suma<50);
			
			System.out.println("La suma supera 50: Suma de la serie de números "+suma);
			
		} catch (InputMismatchException e) {
			System.out.println("Error");
			sc.close();
		}
		
		
		
	}

}
