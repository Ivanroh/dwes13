package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class SieteB {

	public static void main(String[] args) {
		// Factorial con "While"
		
		System.out.println("Introduzca un n�mero entero");
		Scanner sc=new Scanner(System.in);
		int num,fact=1,n;
		
		try {
			num=sc.nextInt();
			n=num;
			
			if (num==0) 
				System.out.println("Factorial de "+n +": "+fact);
			else
				if(num<0)
					System.out.println("No se puede obtener el factorial de un n�mero negativo");
				else{
					while(num>0){
						fact*=num;
						num--;
					}
					
					System.out.println("Factorial de "+n +": "+fact);
				}
			
		} catch (InputMismatchException e) {
			System.out.println("Error, no se ha introducido un n�mero");
			sc.close();
		}

	}

}
