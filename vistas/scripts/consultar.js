var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	tabla=$('#listadoregistros').hide();
	//listarbusquedaavanzada();

	$("#btnBuscar").on("click",function()
	{
		listarbusquedaavanzada();
		tabla=$('#listadoregistros').show();	
	})

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	$("#filtrosls").on("change",function(e)
	{
		cargarSubfiltros(e);	
	})

	//se muestran las categorias
	$.post("../ajax/consultar.php?op=listarcategorias",function(r){
	        $("#categoriasls").html(r);
	});

	//se muestran los filtros
	$.post("../ajax/consultar.php?op=listarfiltros2",function(r){
	        //$("#filtrosls").html(r);
	        $('#tblfl').append(r);
	});
	//se muestran los subfiltros
	$.post("../ajax/consultar.php?op=listarsubfiltros",function(r){
	        $("#subfiltrosls").html(r);
	});


}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#idarchivotk").val("");
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

function cargarSubfiltros(e)
{

	var idFiltro = $("#filtrosls").val();
        if(idFiltro){
            $.ajax({
                type:'POST',
                url:'../ajax/consultar.php?op=listarsubfiltros',
                data:'idFiltro='+idFiltro,
                success:function(html){
                    $('#subfiltrosls').html(html); 
                }
            });
           } 

}


function checkChecked(formname) {
   var list = [];

    $('#' + formname + ' input[type="checkbox"]').each(function() {
        if ($(this).is(":checked")) {

             list.push($(this).val());
        }
    });
 
    return list;
}

//<form id="searchForm" name="searchForm" method="GET" action="" onsubmit="return checkChecked('searchForm');">


function listarbusquedaavanzada()
{

	
	var idFiltro = $("#filtrosls").val();
	var idSubFiltro = $("#subfiltrosls").val();
	var list = [];
	list = checkChecked('formularioBA');
	var idCategoria = list.join(","); 
	
	if (!idCategoria)
	{
		bootbox.alert("categoria vacia");
		Listartk('');
		

	}else
	{
		tabla=$('#listadoregistros').show();
		$('#tbllistado').DataTable().destroy();

		tabla=$('#tbllistado').dataTable(
		{
			
			"aProcessing": true,//Activamos el procesamiento del datatables
		    "aServerSide": true,//Paginación y filtrado realizados por el servidor
		    "searching": false	,
		    dom: 'Bfrtip',//	Definimos los elementos del control de tabla
		    buttons: [		          
			            'copyHtml5',
			            'excelHtml5',
			            'csvHtml5',
			            'pdf'
			        ],
			"ajax":
					{
						url: '../ajax/consultar.php?op=listarBusquedaAvan',
						type : "get",
						dataType : "json",						
						//data: formData,
						data: {idCategoria:idCategoria, idFiltro:idFiltro, idSubFiltro,idSubFiltro},
						
						error: function(e){
							console.log(e.responseText);	
						}
					},
			"bDestroy": true,
			"iDisplayLength": 5,//Paginación
		    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
		}).DataTable();

	}
	
	

	/*var dataTable = $('#tbllistado').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : false,
    "ajax" : {
     url:'../ajax/consultar.php?op=listarBusquedaAvan',
     type:"POST",
     data:{
      idCategoria:idCategoria, idFiltro:idFiltro, idSubFiltro,idSubFiltro
     }
    }
   });*/


}




function cargarSubfiltros(e)
{

	var idFiltro = $("#filtrosls").val();
        if(idFiltro){
            $.ajax({
                type:'POST',
                url:'../ajax/consultar.php?op=listarsubfiltros',
                data:'idFiltro='+idFiltro,
                success:function(html){
                    $('#subfiltrosls').html(html); 
                }
            });
           } 

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


function Listartk(idarchivo)
{
	$.post("../ajax/archivotk.php?op=listarTK",{idarchivotk : idarchivotk}, function(data, status)
	{
		data = JSON.parse(data);	
 	})
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