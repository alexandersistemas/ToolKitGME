<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Categoria
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function listarBusquedaAvanzada2($idCategoria, $idFiltro, $idSubFiltro)
	{

		if (empty($idCategoria)) {

			$sql="SELECT nombreArchivoTK, descripcionArchivoTK FROM archivoTK WHERE idArchivoTK = NULL";
		}
		else
		{
			$sql="SELECT nombreArchivoTK, descripcionArchivoTK FROM archivoTK atk inner join archivotk_categoria ac on(ac.idArchivoTK= atk.idArchivoTK) where ac.idCategoria = '$idCategoria'";

			
		}
		
 
		return ejecutarConsulta($sql);
	}


	public function listarBusquedaAvanzada($idCategoria, $idFiltro, $idSubFiltro)
	{
		if (empty($idCategoria)) {

			$sql="SELECT nombreArchivoTK, descripcionArchivoTK FROM archivoTK WHERE idArchivoTK = NULL";
		}
		else
		{
			if (empty($idFiltro)) {

				$sql="SELECT nombreArchivoTK, descripcionArchivoTK FROM archivoTK WHERE idArchivoTK IN (SELECT idArchivoTK FROM archivotk_categoria WHERE idCategoria IN ('$idCategoria') )";
		
				echo"<script type='text/javascript'>alert('$idFiltro');</script>";
			}
			else
			{
				if (!empty($idSubFiltro))
				{
					$sql="SELECT nombreArchivoTK, descripcionArchivoTK FROM archivoTK WHERE idArchivoTK IN (SELECT idArchivoTK FROM archivotk_categoria WHERE idCategoria IN ('$idCategoria') )  AND  idArchivoTK IN (SELECT idArchivoTK FROM archivotk_filtro WHERE idSubFiltro = '$idSubFiltro')";	
				}
				else
				{
					$sql="SELECT nombreArchivoTK, descripcionArchivoTK FROM archivoTK WHERE idArchivoTK IN (SELECT idArchivoTK FROM archivotk_categoria WHERE idCategoria IN ('$idCategoria') )  AND  idArchivoTK IN (SELECT idArchivoTK FROM archivotk_filtro WHERE idFiltro = '$idFiltro')";

				}

			}
		}
		
		return ejecutarConsulta($sql);		
	}
	
	// método para listar subfiltros
	public function listarSubFiltros($idFiltro)
	{
		$sql="SELECT idSubFiltro, nombreSubFiltro FROM subfiltro WHERE estadoSubFiltro = 1 AND idFiltro ='$idFiltro'";
		return ejecutarConsulta($sql);		
	}

	public function listarTodosSubFiltros()
	{
		$sql="SELECT idSubFiltro, nombreSubFiltro FROM subfiltro WHERE estadoSubFiltro = 1";
		return ejecutarConsulta($sql);		
	}


	// método para listar filtros
	public function listarFiltros()
	{
		$sql="SELECT idFiltro, nombreFiltro FROM filtro WHERE estadoFiltro = 1";
		return ejecutarConsulta($sql);		
	}

	// método para listar los tipos de recursos
	public function listarTipoRecursos()
	{
		$sql="SELECT idTipoRecurso, nombreTipoRecurso FROM tiporecurso WHERE estadoTipoRecurso = 1";
		return ejecutarConsulta($sql);		
	}

	// método para listar las categorias
	public function listarCategorias()
	{
		$sql="SELECT idCategoria, nombreCategoria FROM categoria WHERE estadoCategoria = 1";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los archivos
	public function listarArchivos()
	{
		$sql="SELECT nombreArchivoTK, descripcionArchivoTK FROM archivoTK";
		return ejecutarConsulta($sql);		
	}

		public function listarArchivosRecursos()
	{
		$sql="SELECT nombreArchivoTK, autorArchivoTK, idTipoRecurso FROM archivoTK";
		return ejecutarConsulta($sql);		
	}

		public function listarBusquedaGral($key)
	{
		$sql="SELECT nombreArchivoTK, autorArchivoTK, tr.nombreTipoRecurso as NTR, tr.idTipoRecurso as idTipoRecurso FROM archivoTK ntk INNER JOIN tiporecurso tr ON (tr.idTipoRecurso = ntk.idTipoRecurso) where nombreArchivoTK like '%{$key}%' OR  autorArchivoTK like '%{$key}%' OR  tr.nombreTipoRecurso like '%{$key}%'";
		//echo $sql;
		return ejecutarConsulta($sql);		
	}


}

?>