package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class SieteA {

	public static void main(String[] args) {
		
		/*7) Pedir al usuario un n�mero entero y calcular el factorial de dicho n�mero usando la estructura 
		�do-while�. Repetir el ejercicio usando la estructura �while�, 
		y repetirlo una vez m�s usando la estructura �for�.*/
		
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
					do{
						fact*=num;
						num--;
					}
					while(num>0);
					System.out.println("Factorial de "+n +": "+fact);
				}
			
		} catch (InputMismatchException e) {
			System.out.println("Error, no se ha introducido un n�mero");
			sc.close();
		}
		
		
		
	}

}
