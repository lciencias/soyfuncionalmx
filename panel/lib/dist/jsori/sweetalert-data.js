/*SweetAlert Init*/

var noRedes;
var cargos;
var noCargos = 50;
var contadorCargo = 0;
var arrayCargos;
var cargos = new Object();
var  lon = 50;
$(function() {
	"use strict";
	if ( $("#undiv").length > 0 ){
		lon = parseInt($("#noredes").val()) + 1;
	}
	noRedes = new Array(lon);
	arrayCargos = new Array(noCargos);
	for(var i=0; i < lon; i++){
		noRedes[i] = "";
	}			
	if($("#redes").length > 0 && String($("#redes").val()) !== ''){
		var cadenaRedes =$("#redes").val().split('|');
		for (var h = 0; h< cadenaRedes.length; h++){
			if(String(cadenaRedes[h]) !== ''){
				var cadenaDatos = cadenaRedes[h].split('*');
				noRedes[cadenaDatos[0]] = cadenaDatos[1];
			}			
		}		
	}
	
	for(var j=0; j < noCargos; j++){
		arrayCargos[j] = "";
	}

	if($("#cargos").length > 0 && String($("#cargos").val()) !== ''){
		var cadenaCargos =$("#cargos").val().split('|');
		var cadenaHtml = "";
		$("#bodyid").empty();
		for (var w = 0; w< cadenaCargos.length; w++){
			if(String(cadenaCargos[w]) !== ''){			
				var cadenaDatos = cadenaCargos[w].split('#');
				arrayCargos[cadenaDatos[0]] = cadenaDatos[0]+"#"+cadenaDatos[1]+"#"+cadenaDatos[2];
				cadenaHtml  = "<tr><td>"+cadenaDatos[0]+"</td><td>"+cadenaDatos[1]+"</td><td>"+cadenaDatos[2]+"</td>" +
				"<td><img src='"+baseUrl+"lib/dist/img/icons/editar.png' id='m-"+cadenaDatos[0]+"' onclick='editaDatos("+cadenaDatos[0]+");' class='editaCargo' style='cursor:pointer;'></td>" +
				"<td><img src='"+baseUrl+"lib/dist/img/sweetalert/eliminar.png' id='e-"+cadenaDatos[0]+"' onclick='eliminaDatos("+cadenaDatos[0]+");' class='eliminaCargo' style='cursor:pointer;'></a></td>" +
				"</tr>";
				$("#footable_2").append(cadenaHtml);    	
				contadorCargo++;
			}			
		}		
	}

	var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
        
    //Basic
    $('#sa-basic').on('click',function(e){
	    swal({   
			title: "Here's a message!",   
            confirmButtonColor: "#0098a3",   
        });
		return false;
    });

    //A title with a text under
    $('#sa-title').on('click',function(e){
	    swal({   
			title: "Here's a message!",   
            text: "Lorem ipsum dolor sit amet",
			confirmButtonColor: "#0098a3",   
        });
		return false;
    });

    $("#guardaRed").on('click',function(e){
    	var cadena="";
    	var tId = $("#recipient-id").val();
    	var tNm = $("#recipient-name").val();
    	if( (parseInt(tId)>0 ) && String(tNm)!== ''){
    		noRedes[tId] = tNm;
    	}else{
    		noRedes[tId] = "";
    	}
    	//recorre array
    	for(var i=0; i < lon; i++){
    		if(String(noRedes[i]) !== ''){
    			cadena+= i+"*"+noRedes[i]+"|";
    		}    		
    	}
    	$("#redes").val(cadena);
		$("#responsive-modal").modal('hide');
    });
    
    $("#actualizaMesa").on('click',function(e){
    	var cadenaCargo  = "";
    	var cadenaHtml   = "";    	
    	var noComite     = $("#idComiteCargo").val();
    	var nombreComite = $("#nombreComite").val();
    	var cargoComite  = $("#cargoComite").val();
    	if( (String(nombreComite) !== '') && (String(cargoComite) !== '') ){    		
    		arrayCargos[noComite] = noComite+"#"+nombreComite+"#"+cargoComite;
    		$("#bodyid").empty();
    		var contadorCargo = 1;
    		for(var k=0; k < noCargos; k++){
    			if(String(arrayCargos[k]) !== ''){
    				var tmp     = arrayCargos[k].split('#');    			
    				cadenaCargo+= arrayCargos[k]+"|";
    				cadenaHtml  = "<tr><td>"+contadorCargo+"</td><td>"+tmp[1]+"</td><td>"+tmp[2]+"</td>" +
    				"<td><img src='"+baseUrl+"lib/dist/img/icons/editar.png' id='m-"+tmp[0]+"' onclick='editaDatos("+tmp[0]+");' class='editaCargo' style='cursor:pointer;'></td>" +
    				"<td><img src='"+baseUrl+"lib/dist/img/sweetalert/eliminar.png' id='e-"+tmp[0]+"' onclick='eliminaDatos("+tmp[0]+");' class='eliminaCargo' style='cursor:pointer;'></a></td>" +
    				"</tr>";
    				contadorCargo++;
    				$("#footable_2").append(cadenaHtml);    			
    			}    		
    		}
    		$("#cargos").val(cadenaCargo);
    		$("#editor-modal").modal('hide');
    	}
    });
    
    $("#guardaMesa").on('click',function(e){
    	var cadenaCargo  = "";
    	var cadenaHtml   = "";    	
    	var noComite = $("#idComiteCargo").val();
    	var nombreComite = $("#nombreComite").val();
    	var cargoComite  = $("#cargoComite").val();
    	if( (String(nombreComite) !== '') && (String(cargoComite) !== '') ){    		
    		contadorCargo++;
    		if(parseInt(noComite) === 0){
    			arrayCargos[contadorCargo] = contadorCargo+"#"+nombreComite+"#"+cargoComite;
    		}else{
    			arrayCargos[noComite] = noComite+"#"+nombreComite+"#"+cargoComite;
    		}
    		$("#bodyid").empty();
    		for(var k=0; k < noCargos; k++){
    			if(String(arrayCargos[k]) !== ''){
    				var tmp     = arrayCargos[k].split('#');    			
    				cadenaCargo+= arrayCargos[k]+"|";
    				cadenaHtml  = "<tr><td>"+tmp[0]+"</td><td>"+tmp[1]+"</td><td>"+tmp[2]+"</td>" +
    				"<td><img src='"+baseUrl+"lib/dist/img/icons/editar.png' id='m-"+tmp[0]+"' onclick='editaDatos("+tmp[0]+");' class='editaCargo' style='cursor:pointer;'></td>" +
    				"<td><img src='"+baseUrl+"lib/dist/img/sweetalert/eliminar.png' id='e-"+tmp[0]+"' onclick='eliminaDatos("+tmp[0]+");' class='eliminaCargo' style='cursor:pointer;'></a></td>" +
    				"</tr>";
    				$("#footable_2").append(cadenaHtml);    			
    			}    		
    		}
    		$("#cargos").val(cadenaCargo);
    		$("#editor-modal").modal('hide');
    	}else{
    		return false;    		
    	}
    });

    
    $("#nuevoReg").on('click',function(e){
    	$("#nombreComite").val("");
    	$("#cargoComite").val("");
    	$("#editor-modal").modal('show');
    	
    });
    //Success Message
	$('#sa-success').on('click',function(e){
        swal({   
			title: "good job!",   
             type: "success", 
			text: "Lorem ipsum dolor sit amet",
			confirmButtonColor: "#4aa23c",   
        });
		return false;
    });

    $(".bresponsive").on('click',function(e){
    	var tmp = $(this).attr('id').split('-');
    	var id = tmp[0];
    	var nm = tmp[1];
    	if(parseInt(id) > 0){
    		$("#nm").html(nm);
    		$("#recipient-id").val(id);
    		$("#recipient-name").val(noRedes[id]);
    		$("#responsive-modal").modal('show');
    	}
    	return false;
    });

    
    
	$("#mostrar").on('click',function(e){
    	var div = $(this).attr('id');
    	var tmp = div.split('-');
    	var dataString = '';
    	var baseUrl = $("#baseUrl").val();
    	var url = baseUrl+'mostrar-registro.php';
    	var contador = 0;
    	var cadena = "";
    	//vemos cuantos checkbox estan activados
    	$(".checkboxMostrar" ).each(function( index ) {
    		if($(this).prop('checked')){
    			cadena = cadena + $(this).attr('id')+"|";
    			contador++;
    		}
    	});
    	if(contador > 3){
    		swal({   
				title: "Amivtac",   
	             type: "error", 
				text: "S\u00F3lo se pueden seleccionar tres eventos",
				confirmButtonColor: "#4aa23c",   
	        });
			return false;
    	}    	
    	if(String(cadena) != '' && contador < 4){
    		dataString = 'id='+cadena;
    		$.ajax({
				type: 'POST',
				url : url,		
				dataType: 'json',
				data: dataString,
				beforeSend: function(){
				},			
				success: function(data){
					if(parseInt(data.exito) === 1){
						swal("Los eventos seleccionados se mostrar\u00E1n en la p\u00E1gina principal", data.msg, "success");
					}else{
						swal("Error", data.msg, "error");
					}
					return false;
				},
				error: function (xhr, ajaxOptions, thrownError) {
					return false;
			    },
				complete: function(){
				}				
			});    		
    	}    	
	});
	
	$("#mostrarArchivo").on('click',function(e){
    	var div = $(this).attr('id');
    	var tmp = div.split('-');
    	var dataString = '';
    	var baseUrl = $("#baseUrl").val();
    	var url = baseUrl+'mostrar-publicacion.php';
    	var contador = 0;
    	var cadena = "";
    	//vemos cuantos checkbox estan activados
    	$(".checkboxMostrarArchivo" ).each(function( index ) {
    		if($(this).prop('checked')){
    			cadena = cadena + $(this).attr('id')+"|";
    			contador++;
    		}
    	});
    	if(contador > 3){
    		swal({   
				title: "Amivtac",   
	             type: "error", 
				text: "S\u00F3lo se pueden seleccionar tres eventos",
				confirmButtonColor: "#4aa23c",   
	        });
			return false;
    	}    	
    	if(String(cadena) != '' && contador < 4){
    		dataString = 'id='+cadena+'&tipo=1';
    		$.ajax({
				type: 'POST',
				url : url,		
				dataType: 'json',
				data: dataString,
				beforeSend: function(){
				},			
				success: function(data){
					if(parseInt(data.exito) === 1){
						swal("Los eventos seleccionados se mostrar\u00E1n en la p\u00E1gina principal", data.msg, "success");
					}else{
						swal("Error", data.msg, "error");
					}
					return false;
				},
				error: function (xhr, ajaxOptions, thrownError) {
					return false;
			    },
				complete: function(){
				}				
			});    		
    	}    	
	});
	
	$("#mostrarArchivoPiarc").on('click',function(e){
    	var div = $(this).attr('id');
    	var tmp = div.split('-');
    	var dataString = '';
    	var baseUrl = $("#baseUrl").val();
    	var url = baseUrl+'mostrar-publicacion.php';
    	var contador = 0;
    	var cadena = "";
    	//vemos cuantos checkbox estan activados
    	$(".checkboxMostrarArchivo" ).each(function( index ) {
    		if($(this).prop('checked')){
    			cadena = cadena + $(this).attr('id')+"|";
    			contador++;
    		}
    	});
    	if(contador > 3){
    		swal({   
				title: "Amivtac",   
	             type: "error", 
				text: "S\u00F3lo se pueden seleccionar tres eventos",
				confirmButtonColor: "#4aa23c",   
	        });
			return false;
    	}    	
    	if(String(cadena) != '' && contador < 4){
    		dataString = 'id='+cadena+'&tipo=2';
    		$.ajax({
				type: 'POST',
				url : url,		
				dataType: 'json',
				data: dataString,
				beforeSend: function(){
				},			
				success: function(data){
					if(parseInt(data.exito) === 1){
						swal("Los eventos seleccionados se mostrar\u00E1n en la p\u00E1gina principal", data.msg, "success");
					}else{
						swal("Error", data.msg, "error");
					}
					return false;
				},
				error: function (xhr, ajaxOptions, thrownError) {
					return false;
			    },
				complete: function(){
				}				
			});    		
    	}    	
	});
    //Warning Message
    $('.eliminar').on('click',function(e){
    	var div = $(this).attr('id');
    	var tmp = div.split('-');
    	var dataString = '';
    	var baseUrl = $("#baseUrl").val();
    	var url = baseUrl+'eliminar-registro.php';
    	if(parseInt(tmp[1]) > 0 && parseInt(tmp[2]) > 0 ){
    		dataString = 'id='+tmp[1]+"&idModulo="+tmp[2];
    	    swal({   
                title: "Desea eliminar el registro?",   
                text: "",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#f8b32d",   
                confirmButtonText: "Eliminar",   
                closeOnConfirm: false 
            }, function(){
    			$.ajax({
    				type: 'POST',
    				url : url,		
    				dataType: 'json',
    				data: dataString,
    				beforeSend: function(){
    					//$('#procesando').html(procesando);
    				},			
    				success: function(data){
    					if(parseInt(data.exito) === 1){
    						swal("Eliminado!", data.msg, "success");
                            setTimeout(function(){            					
                            	location.href=baseUrl+data.url;
                            	}
                            ,2500);       						
    					}else{
    						swal("Error", data.msg, "error");
    					}
    					return false;
    				},
    				error: function (xhr, ajaxOptions, thrownError) {
    					error("Error");
    					return false;
    			    },
    				complete: function(){
    				}				
    			});            		 
            });    		
    	}
		return false;
    });

	
    $('#sa-warning,.sa-warning').on('click',function(e){
   	    swal({   
               title: "Desea eliminar el registro?",   
               text: "",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#f8b32d",   
                confirmButtonText: "Eliminar",   
                closeOnConfirm: false 
            }, function(){
            	swal("Â¡Eliminado!", "El registro ha sido eliminado.", "success");
            });    		
    });
    
    $('#crearSlider, #editarSlider').on('click',function(e){
	    swal({   
            title: "Desea guardar el registro?",   
            text: "",   
            type: "info",   
            showCancelButton: true,   
            confirmButtonColor: "#4aa23c",   
            confirmButtonText: "Si",   
            closeOnConfirm: false 
        }, function(){   
        	$( "#validateFormSlider" ).submit();
        });
		return false;
    });
    
    $('.cancelaRegistro').on('click',function(e){
    	var baseUrl = $("#baseUrl").val();
    	var url = baseUrl+$(this).attr('id');
	    swal({   
            title: "Desea salir del formulario sin guardar?",   
            text: "",   
            type: "info",   
            showCancelButton: true,   
            confirmButtonColor: "#4aa23c",   
            confirmButtonText: "Si",   
            closeOnConfirm: false 
        }, function(){   
        	location.href = url;
        });
		return false;
    });

	$("#nuevoRevista").click(function(){
		if(String($("#url").val()) != "" && String($("#documento").val()) != ""){
			swal({   
				title: "Amivtac",   
	             type: "error", 
				text: "Debe de registrar la Url o el archivo PDF",
				confirmButtonColor: "#4aa23c",   
	        });
			return false;
		}
		return true;
	});

	$("#actualizarRevista").click(function(){
		if(String($("#url").val()) != "" && String($("#documento").val()) != ""){
			swal({   
				title: "Amivtac",   
                type: "error", 
                text: "Debe de registrar la Url o el archivo PDF",
				confirmButtonColor: "#4aa23c",   
	        });
			return false;
		}
		return true;
	});

    //Parameter
	$('#sa-params').on('click',function(e){
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this imaginary file!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#f8b32d",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your imaginary file has been deleted.", "success");   
            } else {     
                swal("Cancelled", "Your imaginary file is safe :)", "error");   
            } 
        });
		return false;
    });

    //Custom Image
	$('#sa-image').on('click',function(e){
		swal({   
            title: "John!",   
            text: "Recently joined twitter",   
            imageUrl: "dist/img/user.png" ,
			confirmButtonColor: "#f33923",   
			
        });
		return false;
    });

    //Auto Close Timer
	$('#sa-close').on('click',function(e){
        swal({   
            title: "Auto close alert!",   
            text: "I will close in 2 seconds.",   
            timer: 2000,   
            showConfirmButton: false 
        });
		return false;
    });


    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert;
	
	$.SweetAlert.init();
});


function editaDatos(id){
	var data = "";
	if(parseInt(id) > 0){		
    	data = arrayCargos[id].split('#');
    	$("#idComiteCargo").val(data[0]);
    	$("#nombreComite").val(data[1]);
    	$("#cargoComite").val(data[2]);
    	$("#editor-modal").modal('show');
	}
	return false;
}
function eliminaDatos(id){
	var data = "";
	var cadenaCargo  = "";
	var cadenaHtml   = "";
	var contadorCargo = 1;
	if(parseInt(id) > 0){
		arrayCargos[id] = "";
		$("#bodyid").empty();
		for(var k=0; k < noCargos; k++){
			if(String(arrayCargos[k]) !== ''){
				var tmp     = arrayCargos[k].split('#');    			
				cadenaCargo+= arrayCargos[k]+"|";
				cadenaHtml  = "<tr><td>"+contadorCargo+"</td><td>"+tmp[1]+"</td><td>"+tmp[2]+"</td>" +
				"<td><img src='"+baseUrl+"lib/dist/img/icons/editar.png' id='m-"+tmp[0]+"' onclick='editaDatos("+tmp[0]+");' class='editaCargo' style='cursor:pointer;'></td>" +
				"<td><img src='"+baseUrl+"lib/dist/img/sweetalert/eliminar.png' id='e-"+tmp[0]+"' onclick='eliminaDatos("+tmp[0]+");' class='eliminaCargo' style='cursor:pointer;'></a></td>" +
				"</tr>";
				contadorCargo++;
				$("#footable_2").append(cadenaHtml);    	
				
			}    		
		}
		$("#cargos").val(cadenaCargo);		
	}
	return false;

}

/*********************************
 	&Aacute; 	\u00C1
 	&aacute; 	\u00E1
 	&Eacute; 	\u00C9
 	&eacute; 	\u00E9
 	&Iacute; 	\u00CD
 	&iacute; 	\u00ED
 	&Oacute; 	\u00D3
 	&oacute; 	\u00F3
 	&Uacute; 	\u00DA
 	&uacute; 	\u00FA
	&Uuml; 	\u00DC
 	&uuml; 	\u00FC
 	&Ntilde; 	\u00D1
 	&ntilde; 	\u00F1
******************************/