package controlDeFlujo;

import java.util.Scanner;

public class Dos {

	public static void main(String[] args) {
		// 2) Pedir al usuario cinco cadenas de texto y generar una sola cadena
		// uniéndolas todas. Escribir esa cadena por pantalla

		
		System.out.println("Introduzca 5 cadenas de texto: ");
		Scanner sc=new Scanner(System.in);
		String cadena="";
		for (int i = 0; i < 5; i++) {
			String aux=sc.nextLine() + " ";
			cadena+=aux;
		}
		System.out.println(cadena);
		sc.close();
	}

}
