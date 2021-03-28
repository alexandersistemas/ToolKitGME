var tabla;

//Función que se ejecuta al inicio
function init(){
	  	$(function() {
			$("#typeahead").keyup(function()
            {
                var x = $(this).val();
                $.post("../ajax/home.php?op=busquedagral&key="+x ,function(r){
	        	$('#tblRecursos').empty();
	        	$('#tblRecursos').append(r);
	        	});


            });

    	 });         
	

	//se muestran los recursos
	$.post("../ajax/home.php?op=listarRecursos2",function(r){
	        $('#tblRecursos').append(r);
	});


}

init();