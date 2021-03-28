<?php 
require_once "../modelos/Consultar.php";

$archivotk=new Categoria();

$key=isset($_GET["key"])? limpiarCadena($_GET["key"]):"";
$op=isset($_GET["op"])? limpiarCadena($_GET["op"]):"";

switch ($op){

	case 'busquedagral':
		$count = 0;
		$rspta = $archivotk->listarBusquedaGral($key);	

		//Mostramos la lista de recursos(archivos) en la vista 
		while ($reg = $rspta->fetch_object())
				{		
					$count = $count + 1;				
					
					if ($count == 1)
					{
						echo '<tr>';		
					}	
					
									
					echo '<td align="center">';
					echo '<div class="contenedor">';

					if ($reg->idTipoRecurso == 1)
					{					
						
						echo '<img src="../public/img/guiapro.png" height="200px" width="200px"/>';
					
					}
					if ($reg->idTipoRecurso == 2)
					{					
						
						echo '<img src="../public/img/listapro.png" height="200px" width="200px"/>';
						
					}
					if ($reg->idTipoRecurso == 3)
					{
						
						echo '<img src="../public/img/metopro.png" height="200px" width="200px"/>';
						
					}	

					echo '<div class="textoNombre">'.$reg->nombreArchivoTK.'</div>';
					echo '<div class="textoAutor">'.$reg->autorArchivoTK.'</div>';
					echo '</div>';								

					echo '</td>';

					if ($count == 4)
					{
						echo '</tr>';	
						$count = 0;		
					}			
					
				}
	break;

	case 'listarRecursos':

		$count = 0;
		$rspta = $archivotk->listarArchivosRecursos();		

		//Mostramos la lista de recursos(archivos) en la vista 
		while ($reg = $rspta->fetch_object())
				{		
					$count = $count + 1;				
					
					if ($count == 1)
					{
						echo '<tr>';		
					}	
					
					echo '<td><p align="center">';
					echo '<button class="btn">';

					if ($reg->idTipoRecurso == 1)
					{
						echo '<i class="fa fa-book"></i></br>'.$reg->nombreArchivoTK.'</br>'.$reg->autorArchivoTK;
					}
					if ($reg->idTipoRecurso == 2)
					{
						echo '<i class="fa fa-list"></i></br>'.$reg->nombreArchivoTK.'</br>'.$reg->autorArchivoTK;
					}
					if ($reg->idTipoRecurso == 3)
					{
						echo '<i class="fa fa-cogs"></i></br>'.$reg->nombreArchivoTK.'</br>'.$reg->autorArchivoTK;
					}

					echo '</button></p>';
					echo '</td>';

					if ($count == 4 )
					{
						echo '</tr>';	
						$count = 0;		
					}			
					
				}
	break;

	case 'listarRecursos2':

		$count = 0;
		$rspta = $archivotk->listarArchivosRecursos();		

		//Mostramos la lista de recursos(archivos) en la vista 
		while ($reg = $rspta->fetch_object())
				{		
					$count = $count + 1;				
					
					if ($count == 1)
					{
						echo '<tr>';		
					}	
					
									
					echo '<td align="center">';
					echo '<div class="contenedor">';

					if ($reg->idTipoRecurso == 1)
					{					
						
						echo '<img src="../public/img/guiapro.png" height="200px" width="200px"/>';
					
					}
					if ($reg->idTipoRecurso == 2)
					{					
						
						echo '<img src="../public/img/listapro.png" height="200px" width="200px"/>';
						
					}
					if ($reg->idTipoRecurso == 3)
					{
						
						echo '<img src="../public/img/metopro.png" height="200px" width="200px"/>';
						
					}	

					echo '<div class="textoNombre">'.$reg->nombreArchivoTK.'</div>';
					echo '<div class="textoAutor">'.$reg->autorArchivoTK.'</div>';
					echo '</div>';								

					echo '</td>';

					if ($count == 4)
					{
						echo '</tr>';	
						$count = 0;		
					}			
					
				}
	break;

	
}
?>