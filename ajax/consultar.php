<?php 
require_once "../modelos/Consultar.php";

$archivotk=new Categoria();

$idCategoria=isset($_GET["idCategoria"])? limpiarCadena($_GET["idCategoria"]):"";
$idFiltro=isset($_POST["idFiltro"])? limpiarCadena($_POST["idFiltro"]):"";
$idSubFiltro=isset($_POST["idSubFiltro"])? limpiarCadena($_POST["idSubFiltro"]):"";


$idArchivotk=isset($_POST["idArchivoTK"])? limpiarCadena($_POST["idArchivoTK"]):"";
$nombre=isset($_POST["nombreArchivoTK"])? limpiarCadena($_POST["nombreArchivoTK"]):"";
$descripcion=isset($_POST["descripcionArchivoTK"])? limpiarCadena($_POST["descripcionArchivoTK"]):"";
$ruta="../files/";


switch ($_GET["op"]){
	
	case 'listarBusquedaAvan':
		$rspta=$archivotk->listarBusquedaAvanzada2($idCategoria,$idFiltro,$idSubFiltro);		
		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array( 				
 				"0"=>$reg->nombreArchivoTK,
 				"1"=>$reg->descripcionArchivoTK 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'listartiporecursos':
		$rspta=$archivotk->listarTipoRecursos();				
		echo '<option value = "">Selecciona un tipo...</option>';
		//Mostramos la lista de tipo de recursos en la vista 
		while ($reg = $rspta->fetch_object())
				{					
					echo '<option value="'.$reg->idTipoRecurso.'"> '. $reg->nombreTipoRecurso.'</option>';
				}
	break;

	case 'listarcategorias':
		$rspta=$archivotk->listarCategorias();		
		//Mostramos la lista de categorias en la vista 
		while ($reg = $rspta->fetch_object())
				{					
					echo '<li> <input type="checkbox" name="cboxcat[]" value="'.$reg->idCategoria.'"> '.$reg->nombreCategoria.'</li>';
				}
	break;

	case 'listarfiltros2':
		$rspta=$archivotk->listarFiltros();		
		$count = 0;
		//Mostramos la lista de filtros en la vista 
		while ($reg = $rspta->fetch_object())
				{	
					echo '<ul style="list-style: none;" id="filtrosls">';
					echo '<tr><td><li><input type="checkbox" name="cboxfil[]" value="'.$reg->idFiltro.'"> '.$reg->nombreFiltro.'</li></td></tr><tr><td>';
					//Mostramos la lista de subfiltros en la vista a partir del filtro 
					$rspta2=$archivotk->listarSubFiltros($reg->idFiltro);
					

					//filtro de adaptabilidad tiene un tratamiento diferente en cuanto a subfiltros
					//puesto que estos se mostraran en checkbox para una selección multiple
					if ($reg->idFiltro == 5)
					{
						echo '<ul style="list-style: none;" id="subfiltroadaptabilidad">';
						while ($reg2 = $rspta2->fetch_object())
						{
							echo '<li><input type="checkbox" name="cboxsubfiladap[]" value="'.$reg2->idSubFiltro.'"> '.$reg2->nombreSubFiltro.'</li>';
						}
						echo '</ul>';
					}
					else{

						echo'<select name="subfiltrols[]">';
						echo '<option value = "">Selecciona subfiltro...</option>';
						while ($reg2 = $rspta2->fetch_object())
						{
							echo '<option value="'.$reg2->idSubFiltro.'"> '. $reg2->nombreSubFiltro.'</option>';
						}				
						echo'</select>';
						echo '</ul>';

					}
					
					echo '</td></tr>';					
					echo '<tr><td></br></td></tr>';
				}

	break;

	case 'listarsubfiltros2':
		$rspta=$archivotk->listarFiltros();		
		//Mostramos la lista de filtros en la vista 
		while ($reg = $rspta->fetch_object())
				{					
					echo '<tr><td>'.$reg->nombreFiltro.'</td></tr><tr><td></br></td></tr>';
				}
	break;

	case 'listarfiltros':
		$rspta=$archivotk->listarFiltros();
		//Mostramos la lista de filtros en la vista 
		while ($reg = $rspta->fetch_object())
				{					
					echo '<li> <input type="checkbox" id=cboxfil'.$reg->idFiltro.' value="'.$reg->idFiltro.'"> '. $reg->nombreFiltro .'</li>';
				}		
	break;

	case 'listarsubfiltros':
		$rspta=$archivotk->listarTodosSubFiltros();
		//Mostramos la lista de filtros en la vista 
		while ($reg = $rspta->fetch_object())
				{					
					echo '<li> <input type="checkbox" id=cboxsubfil'.$reg->idSubFiltro.' value="'.$reg->idSubFiltro.'"> '. $reg->nombreSubFiltro .'</li>';
				}		
		// echo '<option value = "">Selecciona un Subfiltro...</option>';
		// //Mostramos la lista de subfiltros en la vista 
		// while ($reg = $rspta->fetch_object())
		// 		{					
		// 			echo '<option value="'.$reg->idSubFiltro.'"> '. $reg->nombreSubFiltro.'</option>';
		// 		}
	break;

	case 'listarTK':
		$rspta=$archivotk->listarArchivos();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array( 				
 				"0"=>$reg->nombreArchivoTK,
 				"1"=>$reg->descripcionArchivoTK 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	/*case 'guardaryeditar':
		if (empty($idArchivoTK)){
			$rspta=$archivotk->insertar($nombre,$descripcion,$ruta);
			echo $rspta ? "Archivo registrado" : "Archivo no se pudo registrar";
		}
		else {
			$rspta=$archivotk->editar($idArchivotk,$nombre,$descripcion);
			echo $rspta ? "Archivo actualizado" : "Archivo no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$archivotk->desactivar($idArchivotk);
 		echo $rspta ? "Archivo Desactivado" : "Archivo no se puede desactivar"; 		
	break;

	case 'activar':
		$rspta=$archivotk->activar($idArchivotk);
 		echo $rspta ? "Archivo activado" : "Archivo no se puede activar"; 		
	break;

	case 'mostrar':
		$rspta=$archivotk->mostrar($idArchivotk);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta); 		
	break;
*/
}
?>