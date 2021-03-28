var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(true);
	//listar();

	//se muestran los tipos recurso
	$.post("../ajax/consultar.php?op=listartiporecursos",function(r){
	        $("#tiporecursols").html(r);
	});
	//se muestran las categorias
	$.post("../ajax/consultar.php?op=listarcategorias",function(r){
	        $("#categoriasls").html(r);	        
	});

	//se muestran los filtros
	$.post("../ajax/consultar.php?op=listarfiltros2",function(r){
	        //$("#filtrosls").html(r);
	        $('#tblfl').append(r);
	});

	//se muestran los subfiltros en tabla
	// $.post("../ajax/consultar.php?op=listarsubfiltros2",function(r){
	//         $('#tblsubfl').append(r);
	// });

	//se muestran los subfiltros
	// $.post("../ajax/consultar.php?op=listarsubfiltros",function(r){
	//         $("#subfiltrosls").html(r);
	// });
	
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#idarchivotk").val("");
	$("#definicionArchivoTK").val("");
	$("#utilidadArchivoTK").val("");
	$("#planArchivoTK").val("");
	$("#adoptadoArchivoTK").val("");
	$("#tipoRecursoArchivoTK").val("");
	$("#autorArchivoTK").val("");

}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{

		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    "searching": true,
	    dom: 'Bfrtip',//	Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/archivotk.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 10,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


//Función para guardar o editar
function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/archivotk.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idarchivo)
{
	$.post("../ajax/archivotk.php?op=mostrar",{idarchivotk : idarchivotk}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre").val(data.nombre);
		$("#descripcion").val(data.descripcion);
 		$("#idcategoria").val(data.idcategoria);

 	})
}

//Función para desactivar registros
function desactivar(idarchivo)
{
	bootbox.confirm("¿Está Seguro de desactivar el archivo?", function(result){
		if(result)
        {
        	$.post("../ajax/archivotk.php?op=desactivar", {idarchivotk : idarchivotk}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idarchivotk)
{
	bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/archivotk.php?op=activar", {idarchivotk : idarchivotk}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();