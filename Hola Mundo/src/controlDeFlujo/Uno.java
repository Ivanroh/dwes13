package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class Uno {

	public static void main(String[] args) {
		// 1) Preguntar al usuario el día de la semana e indicar si es laborable
		// o no. Resolver utilizando la estructura switch.
		
		Scanner sc=new Scanner(System.in);

		try {
			System.out.println("Indique el día de la semana");
			int dia=sc.nextInt();
			
			if (dia<=0 || dia>31) {
				System.out.println("Error día incorrecto");
			}
			else{
				switch (dia) {
				case 6:
				case 7:
				case 13:
				case 14:
				case 20:
				case 21:
				case 27:
				case 28:
					System.out.println("No laborable");
					break;
	
				default:System.out.println("Laborable");
					break;
				}
			}
		} catch (InputMismatchException e) {
			System.out.println("Error");
			sc.close();
		}

	}

}
