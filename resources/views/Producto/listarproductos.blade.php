<!DOCTYPE html>
<html lang="es">	
	<head>
		<link rel="stylesheet" href="../css/controllerProducto/listarProductos.css">		
		<script src="../js/controllerProducto/altaProducto.js"></script>
	</head>
	
	<body>
	@include('layouts.headerVisitante')	
	<div class = "centro">	
		<button class="accordion">Section 1</button>
			<div class="panel">
  				<p>Lorem ipsum...</p>
			</div>
		<button class="accordion">Section 2</button>
			<div class="panel">
			  	<p>Lorem ipsum...</p>
			</div>
		<button class="accordion">Section 3</button>
			<div class="panel">
			  	<p>Lorem ipsum...</p>
			</div>
	</div>


	<script type="text/javascript">
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		    acc[i].addEventListener("click", function() {
		    this.classList.toggle("active");
		    var panel = this.nextElementSibling;
		    if (panel.style.maxHeight) {
		      panel.style.maxHeight = null;
		    } else {
		      panel.style.maxHeight = panel.scrollHeight + "px";
		    }
		  });
		}

	function listarProductitos(){
		$.ajax(
	    	{url: "/tip/framework/pelicula/agregar_lista/",
	    	data: { id_pelicula: id_pelicula},
	    	method: "GET",
	     	dataType: "json", 
	     	success: function(json) {
	    		if(json.res==1){
	    			//todo ok
	    			alert(json.msj);
	                //$('#idboton').val("Agregado");
	    		}else{
					alert(json.msj);
	    		}
	    	}
    });


	</script>		 
    </body>
</html>