package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class Seis {

	public static void main(String[] args) {
		//6) Pedir al usuario dos números “a” y “b” entre el 1 y el 10. Mientras uno de ellos sea menor 
		//que el otro, escribir un símbolo “*” en la pantalla e incrementar en una unidad el número menor.

		Scanner sc=new Scanner(System.in);
		boolean validos=true;
		int a,b;
		do{
			try {
					System.out.println("Introduzca un primer número (1-10)");
					a=sc.nextInt();		
					System.out.println("Introduzca un segundo número (1-10)");
					b=sc.nextInt();
					
					if (b>0 && b<=10 && a>0 && a<=10)
						validos=true;
					else
						validos=false;
					
					if (validos) {
						if (a==b)
							System.out.println("Iguales");
						else
							if (a>b) {
								System.out.println("*");
								b+=1;
								//System.out.println("Primer número "+a+" Segundo "+b);
							}
							else{
								System.out.println("*");
								a+=1;
								//System.out.println("Primer número "+a+" Segundo "+b);
							}
					}
					
					if(!validos)
						System.out.println("Algún número no válido, introduzca de nuevo ambos números.\n");
				
			} catch (InputMismatchException e) {
				System.out.println("Error");
				sc=new Scanner(System.in);
				validos=false;
			}
		
		}while(!validos);
		sc.close();
	}

}
