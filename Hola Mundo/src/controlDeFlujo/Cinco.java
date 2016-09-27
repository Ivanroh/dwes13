package controlDeFlujo;

import java.util.Scanner;

public class Cinco {

	public static void main(String[] args) {
		/*5) Preguntar al usuario un número de mes (del 1 al 12) y preguntar 
		si el año es bisiesto (sí o no). Escribir su número de días.
		Si los datos no están bien introducidos se volverán a pedir.
		Utilizar estructura switch.*/
		
		boolean valido=true;
		Scanner sc=new Scanner(System.in);
		int dias=0,mes;
		String bisiesto;
		do {
			
		try {
			valido=true;
			System.out.println("Introduzca un número del mes (1-12)");
			mes=sc.nextInt();
			System.out.println("¿El año es bisiesto? (s/n)");
			bisiesto=sc.next();
			switch (bisiesto) {
			case "s":
			case "si":
					switch (mes) {
					case 1: dias+=31;break;
					case 2:dias+=29+31; break;
					case 3:dias+=31+60;break;
					case 4:dias+=30+91;break;
					case 5:dias+=31+121;break;
					case 6:dias+=30+152;break;
					case 7:dias+=31+182;break;
					case 8:dias+=31+213;break;
					case 9:dias+=30+244;break;
					case 10:dias+=31+274;break;
					case 11:dias+=30+305;break;
					case 12:dias+=31+335;break;
					default:valido=false;break;
					}
			break;
			case "n":
			case "no":
				switch (mes) {
				case 1: dias+=31;break;
				case 2:dias+=28+31; break;
				case 3:dias+=31+59;break;
				case 4:dias+=30+90;break;
				case 5:dias+=31+120;break;
				case 6:dias+=30+151;break;
				case 7:dias+=31+181;break;
				case 8:dias+=31+212;break;
				case 9:dias+=30+243;break;
				case 10:dias+=31+273;break;
				case 11:dias+=30+304;break;
				case 12:dias+=31+334;break;
				default:valido=false;break;
				}
				
				break;


			default:valido=false;break;
			}
					
			if (valido) {
				System.out.println("Días transcurridos "+dias);
			}
			else
				System.out.println("Datos mal introducidos.");
			
			
		} catch (Exception e) {
			System.out.println("Error");
			sc=new Scanner(System.in);
		}
		
		} while (!valido);
		
		
		sc.close();
		

	}

}
