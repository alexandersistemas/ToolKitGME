<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class ArchivoTK
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros de archivos tk
	public function insertar($nombre,$ruta,$definicionArchivoTK,$utilidadArchivoTK,$planArchivoTK,$adaptadoArchivoTK,$autorArchivoTK,$tipoRecursoArchivoTK,$nombreRealArchivoTK,$tipo_archivo,$tam_archivo,$hashtags)
	{
		$sql="INSERT INTO archivoTK (nombreArchivoTK,rutaArchivoTK,estadoArchivoTK,definicionArchivoTK,utilidadArchivoTK,planArchivoTK,adaptadoArchivoTK,autorArchivoTK,idTipoRecurso,nombreRealArchivoTK, tipoArchivoTK, tamanoArchivoTK,hashtagsArchivoTK)
		VALUES ('$nombre','$ruta','1','$definicionArchivoTK','$utilidadArchivoTK','$planArchivoTK','$adaptadoArchivoTK','$autorArchivoTK','$tipoRecursoArchivoTK','$nombreRealArchivoTK', '$tipo_archivo',$tam_archivo,$hashtags)";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	public function insertarCategorias($idCategoria)
	{
		$sql="INSERT INTO archivotk_categoria (idArchivoTK, idCategoria)
		VALUES ((SELECT MAX(idArchivoTK) as idArchivoTK FROM archivotk),$idCategoria)";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	public function insertarFiltros($idFiltro)
	{
		$sql="INSERT INTO archivotk_filtro (idArchivoTK, idFiltro)
		VALUES ((SELECT MAX(idArchivoTK) as idArchivoTK FROM archivotk),$idFiltro)";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	public function insertarSubFiltros($idSubFiltro)
	{
		$sql="INSERT INTO archivotk_subfiltro (idArchivoTK, idSubFiltro)
		VALUES ((SELECT MAX(idArchivoTK) as idArchivoTK FROM archivotk),$idSubFiltro)";
		//echo $sql;
		return ejecutarConsulta($sql);
	}


	//Implementamos un método para editar registros de archivos tk
	public function editar($idarchivo,$nombre,$descripcion)
	{
		$sql="UPDATE archivoTK SET nombreArchivoTK='$nombre',descripcionArchivoTK='$descripcion' WHERE idArchivoTK='$idarchivo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idarchivo)
	{
		$sql="UPDATE archivoTK SET estadoArchivoTK='0' WHERE idArchivoTK='$idarchivo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idarchivo)
	{
		$sql="UPDATE archivoTK SET estadoArchivoTK='1' WHERE idArchivoTK='$idarchivo'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idarchivo)
	{
		$sql="SELECT * FROM archivoTK WHERE idArchivoTK='$idarchivo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT idArchivoTK, nombreArchivoTK, definicionArchivoTK, estadoArchivoTK , CONCAT(rutaArchivoTK, nombreRealArchivoTK) as archivo FROM archivoTK";
		return ejecutarConsulta($sql);		
	}
}

?>