package servlets;

public class Cancion {

	private int idObra;
	private String artista;
	private String titulo;
	private String categoria;
	private double duracion;
	private String imagen;
	private int idAutor;
	private String autor;

	public Cancion(int idObra, String artista, String titulo, String categoria, double duracion, String imagen,
			int idAutor) {
		this.idObra = idObra;
		this.artista = artista;
		this.titulo = titulo;
		this.categoria = categoria;
		this.duracion = duracion;
		this.imagen = imagen;
		this.idAutor = idAutor;
		//this.autor = autor;
	}
	
	public Cancion(int idObra, String artista, String titulo, String categoria, double duracion, String imagen,
			int idAutor,String autor) {
		this.idObra = idObra;
		this.artista = artista;
		this.titulo = titulo;
		this.categoria = categoria;
		this.duracion = duracion;
		this.imagen = imagen;
		this.idAutor = idAutor;
		this.autor = autor;
	}

	public int getIdObra() {
		return idObra;
	}

	public void setIdObra(int idObra) {
		this.idObra = idObra;
	}

	public String getArtista() {
		return artista;
	}

	public void setArtista(String artista) {
		this.artista = artista;
	}

	public String getTitulo() {
		return titulo;
	}

	public void setTitulo(String titulo) {
		this.titulo = titulo;
	}

	public String getCategoria() {
		return categoria;
	}

	public void setCategoria(String categoria) {
		this.categoria = categoria;
	}

	public double getDuracion() {
		return duracion;
	}

	public void setDuracion(double duracion) {
		this.duracion = duracion;
	}

	public String getImagen() {
		return imagen;
	}

	public void setImagen(String imagen) {
		this.imagen = imagen;
	}

	public int getIdAutor() {
		return idAutor;
	}

	public void setIdAutor(int idAutor) {
		this.idAutor = idAutor;
	}

	public String getAutor() {
		return autor;
	}

	public void setAutor(String autor) {
		this.autor = autor;
	}

}
