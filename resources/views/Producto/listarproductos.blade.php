<!DOCTYPE html>
<html lang="es">	
	<head>
		<script src="{{ asset('js/app.js') }}"></script>
    	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="../css/controllerProducto/listarProductos.css">		
		<script src="../js/controllerProducto/altaProducto.js"></script>
	</head>
	
	<body>
	@include('layouts.headerVisitante')	
	<div class = "centro" id="pija">	
	</div>


	<script type="text/javascript">
		
	$(document).ready(function(){
			$.ajax({
				url: "http://localhost/urumarkets/public/listar_productos",
		    	dataType: "json",
		    	method: "GET",
		    	async:false,
		     	success: function(res) {		     		
		     		var elemento;		     		
		     		var cant = Object.keys(res).length;
		     		for (var i = 0; i < cant; i++){
		     			var br = $('<br/>');
		     			console.log(res[i]);
		     			//Botón desplegable
		     			if(res[i].esProducto == "producto" ){
		     				var button = $('<button>').attr("class", "accordion claserandom")
		     									  .attr("type", "button")
		     									  .attr("value", res[i].idProducto).text(res[i].titulo + " - " + "Producto" );
		     			}else{
		     				var button = $('<button>').attr("class", "accordion claserandom")
		     									  .attr("type", "button")
		     									  .attr("value", res[i].idProducto).text(res[i].titulo + " - " + "Servicio" );
		     			}
		     			
		     			$("#pija").append(button);

		     			//Div contenedor de otro div
		     			var divContenedorDeOtroDiv = $('<div>').attr("class", "panel ancho100");
		     			$("#pija").append(divContenedorDeOtroDiv);

		     			//Div donde va a estar todo el contenido del producto.
		     			var div = $('<div>').attr("class", "leoputo");
		     			divContenedorDeOtroDiv.append(div);

		     			//Labels con los datos del producto.
		     			//Descripción del producto.
		     			var label1 = $('<label>').attr("id", "descripcionProducto"+res[i].id)
		     									 .attr("class", "conbr");
		     			label1.text("Descripción del producto: " + res[i].descripcion);     				     			
		     			div.append(label1);		     			
	
		     			//Precio del producto.
		     			var label2 = $('<label>').attr("id", "precioProducto"+res[i].id)
		     									 .attr("class", "conbr");
		     			label2.text("Precio del producto: " + res[i].tipoMoneda + res[i].precio);
		     			div.append(label2);

		     			//Tipo de moneda.
		     			var label3 = $('<label>').attr("id", "tipoMoneda"+res[i].id)
		     									 .attr("class", "conbr");
		    			if(res[i].porcentajeOferta == null || res[i].porcentajeOferta == 0){
		    				label3.text("Porcentaje de oferta: " + "No está en oferta");
		    			}else{
		    				label3.text("Porcentaje de oferta: " + res[i].porcentajeOferta + "%");
		    			}
		     			
		     			div.append(label3);

		     			//Botoncito para modificar
		     			var modificarProducto = $('<input>').attr("type", "button")
		     												.attr("id", res[i].id + "&" + res[i].esProducto)
		     												.attr("value", "Modificar")
		     												.attr("class", "btn btn-success mb-2 somosHerederos")
		     												.attr("onclick","modificarProducto(this)");
		     			var divBoton = $('<div>').attr("class","leogarca");
		     			divBoton.append(modificarProducto);

		     			divContenedorDeOtroDiv.append(divBoton);

					}
	        	}	    	
	    	});		

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

	});

		function modificarProducto(boton){
			var idProducto = boton.id;
			window.location.href = "modificarProducto/"+idProducto;

		}

	</script>		 
    </body>
</html>