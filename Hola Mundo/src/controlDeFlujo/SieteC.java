package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class SieteC {

	public static void main(String[] args) {
		// Factorial con "For"
		
		System.out.println("Introduzca un número entero");
		Scanner sc=new Scanner(System.in);
		int num,fact=1,n;
		
		try {
			num=sc.nextInt();
			n=num;
			
			if (num==0) 
				System.out.println("Factorial de "+n +": "+fact);
			else
				if(num<0)
					System.out.println("No se puede obtener el factorial de un número negativo");
				else{
					
					for (int i = num; i > 0; i--) {
						fact*=i;
					}
										
					System.out.println("Factorial de "+n +": "+fact);
				}
			
		} catch (InputMismatchException e) {
			System.out.println("Error, no se ha introducido un número");
			sc.close();
		}

	}

}
