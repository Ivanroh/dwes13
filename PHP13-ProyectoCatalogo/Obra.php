<?php

class Obra{
	
	private  $idObra;
	private  $artista;
	private  $titulo;
	private  $categoria;
	private  $duracion;
	private  $imagen;
	private  $idAutor;
	private  $autor;
	
	public function getIdObra(){
		return $this->idObra;
	}
	
	public function getArtista(){
		return $this->artista;
	}
	
	public function getTitulo(){
		return $this->titulo;
	}
	
	public function getCategoria(){
		return $this->categoria;
	}
	
	public function getDuracion(){
		return $this->duracion;
	}
	
	public function getImagen(){
		return $this->imagen;
	}
	
	public function getIdAutor(){
		return $this->idAutor;
	}
	
	public function getAutor(){
		return $this->autor;
	}
	
	public function __toString(){
		return "Identificador de Obra: $this->idObra \nArtista: $this->artista \nTitulo: $this->titulo \nCategoria: $this->categoria \nDuracion: $this->duracion \nImagen $this->imagen \nIdentificador Autor: $this->idAutor";
	}
	
}

?>