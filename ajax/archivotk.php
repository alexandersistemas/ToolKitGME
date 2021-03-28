<?php 
require_once "../modelos/ArchivoTK.php";
$archivotk=new ArchivoTK();

$idArchivotk=isset($_POST["idArchivoTK"])? limpiarCadena($_POST["idArchivoTK"]):"";
$nombre=isset($_POST["nombreArchivoTK"])? limpiarCadena($_POST["nombreArchivoTK"]):"";
$hashtagsArchivoTK=isset($_POST["hashtagsArchivoTK"])? limpiarCadena($_POST["hashtagsArchivoTK"]):"";
$definicionArchivoTK=isset($_POST["definicionArchivoTK"])? limpiarCadena($_POST["definicionArchivoTK"]):"";
$utilidadArchivoTK=isset($_POST["utilidadArchivoTK"])? limpiarCadena($_POST["utilidadArchivoTK"]):"";
$planArchivoTK=isset($_POST["planArchivoTK"])? limpiarCadena($_POST["planArchivoTK"]):"";
$adaptadoArchivoTK=isset($_POST["adaptadoArchivoTK"])? limpiarCadena($_POST["adaptadoArchivoTK"]):"";
$autorArchivoTK=isset($_POST["autorArchivoTK"])? limpiarCadena($_POST["autorArchivoTK"]):"";
$tipoRecursoArchivoTK=isset($_POST["tiporecursols"])? limpiarCadena($_POST["tiporecursols"]):"";
$cboxcat = (isset($_POST['cboxcat'])) ? $_POST['cboxcat'] : array(); 
$cboxfil = (isset($_POST['cboxfil'])) ? $_POST['cboxfil'] : array(); 
$cboxsubfiladap = (isset($_POST['cboxsubfiladap'])) ? $_POST['cboxsubfiladap'] : array(); 
$subfiltrols = (isset($_POST['subfiltrols'])) ? $_POST['subfiltrols'] : array(); 
$ruta="../files/";

$archivo = (isset($_FILES['uploadedfile'])) ? $_FILES['uploadedfile'] : null;
if ($archivo) {

	  $time = time();
	  $timeStandar = date("dmY", $time) . date("His", $time) . '_';
	  $unionFechaHora= $timeStandar . "{$archivo['name']}";
 	  $ruta_destino_archivo =  "../files/" . $unionFechaHora;
 	  $tam_archivo = "{$archivo['size']}";
 	  $tipo_archivo = $_FILES["uploadedfile"]["type"];
      
      
	  if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $ruta_destino_archivo)) {
		    echo "El fichero es válido y se subió con éxito.  \n";
		} else {
		    echo "¡No se cargo el archivo!\n";
		    return;
		}
    
      $nombre_archivo =  $unionFechaHora;

   }


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idArchivoTK)){
			$rptaPositiva="";
			$rptaNegativa="";

			$rspta=$archivotk->insertar($nombre,$ruta,$definicionArchivoTK,$utilidadArchivoTK,$planArchivoTK,$adaptadoArchivoTK,$autorArchivoTK,$tipoRecursoArchivoTK,$nombre_archivo,$tipo_archivo,$tam_archivo,$hashtagsArchivoTK);
			
			 $rspta ? $rptaPositiva= "Archivo registrado " : $rptaNegativa="Archivo no se pudo registrar ";

			//Se insertan las categorias en la tabla archivotk_categoria
			if(count($cboxcat) > 0) {
				foreach($cboxcat as $cboxcat) {
	            	$rspta=$archivotk->insertarCategorias($cboxcat);
	        	}
			}
			$rspta ? $rptaPositiva= $rptaPositiva . ",Categorias registradas" : $rptaNegativa= $rptaNegativa . ",Categorias no se pudieron registrar";

			//Se insertan las subfiltros de la categoria adaptabilidad en la tabla archivotk_subfiltro
			if(count($cboxsubfiladap) > 0) {
				foreach($cboxsubfiladap as $cboxsubfiladap) {
	            	$rspta=$archivotk->insertarCategorias($cboxcat);
	        	}
			}
			$rspta ? $rptaPositiva= $rptaPositiva . ",Subfiltro adaptabilidad registradas" : $rptaNegativa= $rptaNegativa . ",Subfiltro adaptabilidad no se pudieron registrar";


			//Se insertan los filtros en la tabla archivotk_filtro
			if(count($cboxfil) > 0) {
				foreach($cboxfil as $cboxfil) {
	            	$rspta=$archivotk->insertarFiltros($cboxfil);
	        	}
			}
			$rspta ? $rptaPositiva= $rptaPositiva . ",Filtros registrados" : $rptaNegativa= $rptaNegativa . ",Filtros no se pudieron registrar";


			//Se insertan los subfiltros en la tabla archivotk_subfiltro
			if(count($subfiltrols) > 0) {
				foreach($subfiltrols as $subfiltrols) {
	            	$rspta=$archivotk->insertarSubFiltros($subfiltrols);
	        	}
			}
			$rspta ? $rptaPositiva= $rptaPositiva . ",SubFiltros registrados" : $rptaNegativa= $rptaNegativa . ",SubFiltros no se pudieron registrar";


			//Se insertan las subfiltros del filtro  adaptabilidad en la tabla archivotk_subfiltro
			if(count($cboxsubfiladap) > 0) {
				foreach($cboxsubfiladap as $cboxsubfiladap) {
	            	$rspta=$archivotk->insertarSubFiltros($cboxcat);
	        	}
			}
			$rspta ? $rptaPositiva= $rptaPositiva . ",Subfiltro adaptabilidad registrada" : $rptaNegativa= $rptaNegativa . ",Subfiltro adaptabilidad no se pudieron registrar";


			$rspta = $rptaPositiva . $rptaNegativa;

			echo $rspta; 
		}
		else {
			$rspta=$archivotk->editar($idArchivotk,$nombre,$definicionArchivoTK);
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

	case 'listar':
		$rspta=$archivotk->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->idArchivoTK)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idArchivoTK.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idArchivoTK.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idArchivoTK.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idArchivoTK.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombreArchivoTK,
 				"2"=>$reg->definicionArchivoTK,
 				"3"=>($reg->estadoArchivoTK)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>',
 				"4"=> '<a href="'.$reg->archivo.'">'.'<button class="btn btn-primary"><i class="fa fa-file"></i></button><a>'


 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>