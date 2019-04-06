var baseUrl = $("#baseUrl").val();
$(document).ready(function() {    
    $( document ).delegate(".submit", "click", function(e) {
        var i = 0;
        $('#procesando').html(procesando);     
        setTimeout(function(){		 
    	i++;
        },500);	
    });

    $( ".datetimepicker").datetimepicker({
	    format: 'YYYY-MM-DD HH:MM:SS',
	    inline: false,
	    sideBySide: true,
	    locale: 'es'
    });

    $( ".datepicker").datetimepicker({
	    format: 'DD-MM-YYYY',
	    inline: false,
	    sideBySide: true,
	    locale: 'es'
    });

$("#fechaInicio").on("dp.change", function (e) {
    $('#fechaFinal').data("DateTimePicker").minDate(e.date);
}); 

    //Slider
	var formUser = $('validateFormSlider');
	formUser.on('submit', function(e){
		e.preventDefault();
	});

	$('#validateFormSlider').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	nombre: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: letras,
                        message: 'El campo es s&oacute;lo para letras'
                    },
                    stringLength: {
                        min: 6,
                        max: 50,
                        message: 'Minimo 6 y maximo 50 caracteres'
                    }
                }
            }
        }
    });
	
	//Delegacion
	
	var formUser = $('validateFormDelegacion');
	formUser.on('submit', function(e){
		e.preventDefault();
	});

	$('#validateFormDelegacion').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	nombre: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: alfanum,
                        message: 'El campo es s&oacute;lo para letras y n&uacute;meros'
                    },
                    stringLength: {
                        min: 6,
                        max: 150,
                        message: 'Minimo 6 y maximo 150 caracteres'
                    }
                }
            },
            idestado: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: numericos,
                        message: 'El campo es s&oacute;lo para letras'
                    },
                    stringLength: {
                        min: 1,
                        max: 2,
                        message: 'Minimo 1 y maximo 2 caracteres'
                    }
                }
            }/*,            
            telefono: {
                message: 'Campo obligatorio',
                validators: {
                    regexp: {
                        regexp: numericos,
                        message: 'El campo es s&oacute;lo para numeros'
                    },
                    stringLength: {
                        min: 0,
                        max: 10,
                        message: 'Minimo 0 y maximo 10 caracteres'
                    }
                }
            },
            correo: {
                message: 'Campo obligatorio',
                validators: {
                    regexp: {
                        regexp: /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i,
                        message: 'El correo no es valido'
                    },
                    stringLength: {
                        min: 0,
                        max: 50,
                        message: 'Minimo 0 y maximo 50 caracteres'
                    }
                }
            },
            url: {
                message: 'Campo obligatorio',
                validators: {
                    regexp: {
                    	regexp: url,
                        message: 'Favor de teclear una url correcta'
                    },                                       
                    stringLength: {
                        min: 0,
                        max: 250,
                        message: 'Minimo 0 y maximo 250 caracteres'
                    }
                }
            }*/
        }
    });

	
	//Comite
	var formUser = $('validateFormComite');
	formUser.on('submit', function(e){
		e.preventDefault();
	});

	$('#validateFormComite').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	nombre: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: alfanum,
                        message: 'El campo es s&oacute;lo para letras'
                    },
                    stringLength: {
                        min: 6,
                        max: 150,
                        message: 'Minimo 6 y maximo 150 caracteres'
                    }
                }
            },
            presidente: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: letras,
                        message: 'El campo es s&oacute;lo para letras'
                    },
                    stringLength: {
                        min: 6,
                        max: 50,
                        message: 'Minimo 6 y maximo 50 caracteres'
                    }
                }
            }/*,
            telefono: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: numericos,
                        message: 'El campo es s&oacute;lo para numeros'
                    },
                    stringLength: {
                        min: 7,
                        max: 10,
                        message: 'Minimo 7 y maximo 10 caracteres'
                    }
                }
            },
            correo: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i,
                        message: 'El correo no es valido'
                    },
                    stringLength: {
                        min: 7,
                        max: 50,
                        message: 'Minimo 7 y maximo 50 caracteres'
                    }
                }
            },
            url: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },                 
                    regexp: {
                    	regexp: url,
                        message: 'Favor de teclear una url correcta'
                    },                                       
                    stringLength: {
                        min: 5,
                        max: 250,
                        message: 'Minimo 5 y maximo 250 caracteres'
                    }
                }
            }*/
        }
    });
	
	//Presidente
	var form = $('validateFormPresidente');
	form.on('submit', function(e){
		e.preventDefault();
	});

	$('#validateFormPresidente').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	nomesa: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: alfanum,
                        message: 'El campo es s&oacute;lo para letras y n�meros'
                    },
                    stringLength: {
                        min: 1,
                        max: 70,
                        message: 'Minimo 1 y maximo 70 caracteres'
                    }
                }
            },
            presidente: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: letras,
                        message: 'El campo es s&oacute;lo para letras'
                    },
                    stringLength: {
                        min: 3,
                        max: 50,
                        message: 'Minimo 3 y maximo 50 caracteres'
                    }
                }
            }
        }
    });

	//Cargo
	var form = $('validateFormCargo');
	form.on('submit', function(e){
		e.preventDefault();
	});

	$('#validateFormCargo').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	nombre: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: alfanum,
                        message: 'El campo es s&oacute;lo para car&aacute;cteres alfanumericos'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'Minimo 3 y maximo 100 caracteres'
                    }
                }
            },
            cargo: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: alfanum,
                        message: 'El campo es s&oacute;lo para car&aacute;cteres alfanumericos'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'Minimo 3 y maximo 100 caracteres'
                    }
                }
            }
        }
    });
	
	//Coordinador
	var form = $('validateFormCoordinador');
	form.on('submit', function(e){
		e.preventDefault();
	});

	$('#validateFormCoordinador').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	nombre: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: letras,
                        message: 'El campo es s&oacute;lo para letras'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'Minimo 3 y maximo 100 caracteres'
                    }
                }
            },
            coordinacion: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: letras,
                        message: 'El campo es s&oacute;lo para letras'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'Minimo 3 y maximo 100 caracteres'
                    }
                }
            }
        }
    });	
	
	
	//Biblioteca
	var form = $('validateFormBiblioteca');
	form.on('submit', function(e){
		e.preventDefault();
	});

	$('#validateFormBiblioteca').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	nombre: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: alfanum,
                        message: 'El campo es s&oacute;lo para letras y n&uacute;meros'
                    },
                    stringLength: {
                        min: 3,
                        max: 20,
                        message: 'Minimo 3 y maximo 20 caracteres'
                    }
                }
            }
        }
    });		
	//Revista	
	var form = $('validateFormRevista');
	form.on('submit', function(e){
		e.preventDefault();
	});

	$('#validateFormRevista').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	titulo: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: alfanum,
                        message: 'El campo es s&oacute;lo para letras y n&uacute;meros'
                    },
                    stringLength: {
                        min: 3,
                        max: 120,
                        message: 'Minimo 3 y maximo 120 caracteres'
                    }
                }
            },
            periodo: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: alfanum,
                        message: 'El campo es s&oacute;lo para letras y n&uacute;meros'
                    },
                    stringLength: {
                        min: 3,
                        max: 50,
                        message: 'Minimo 3 y maximo 20 caracteres'
                    }
                }
            }  
        }
    });		
	
	// biblioteca	
	var form = $('validateFormSubcarpetaAmivtac');
	form.on('submit', function(e){
		e.preventDefault();
	});

	$('#validateFormSubcarpetaAmivtac').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	subcarpeta: {
        		message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: carpeta,
                        message: 'El campo es s&oacute;lo para letras y n&uacute;meros'
                    },
                    stringLength: {
                        min: 3,
                        max: 500,
                        message: 'Minimo 3 y maximo 500 caracteres'
                    }
                }
            }  
        }
    });			
	
	//Socios
	var form = $('validateFormSocio');
	form.on('submit', function(e){
		e.preventDefault();
	});

	$('#validateFormSocio').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	nombre: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: letras,
                        message: 'El campo es s&oacute;lo para letras'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'Minimo 3 y maximo 100 caracteres'
                    }
                }
            },
            fecha_reconocimiento: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: fecha,
                        message: 'Campo de fecha'
                    },                    
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'El campo es de 10 caracteres'
                    }
                }
            }
        }
    });	
	
	
	//Acuerdos
	var form = $('validateFormAcuerdo');
	form.on('submit', function(e){
		e.preventDefault();
	});

	
	$('#validateFormAcuerdo').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	nombre: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: letras,
                        message: 'El campo es s&oacute;lo para letras'
                    },
                    stringLength: {
                        min: 3,
                        max: 200,
                        message: 'Minimo 3 y maximo 200 caracteres'
                    }
                }
            },
            url: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },                 
                    regexp: {
                    	regexp: url,
                        message: 'Favor de teclear una url correcta'
                    },                                       
                    stringLength: {
                        min: 5,
                        max: 250,
                        message: 'Minimo 5 y maximo 250 caracteres'
                    }
                }
            },
        	texto: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: alfanum,
                        message: 'El campo es s&oacute;lo para letras y numeros'
                    },
                    stringLength: {
                        min: 3,
                        max: 999,
                        message: 'Minimo 3 y maximo 999 caracteres'
                    }
                }
            }            
        }
    });	
	
	//Eventos	
	var form = $('validateFormEvento');
	form.on('submit', function(e){
		e.preventDefault();
	});

	
	$('#validateFormEvento').bootstrapValidator({
        message: 'Campo obligatorio',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	titulo: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: letras,
                        message: 'El campo es s&oacute;lo para letras'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'Minimo 3 y maximo 100 caracteres'
                    }
                }
            },
        	fecha_evento: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: fecha,
                        message: 'Campo de fecha'
                    },
                    stringLength: {
                        min: 19,
                        max: 20,
                        message: '19 caracteres'
                    }
                }
            },
            lugar: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: alfanum,
                        message: 'El campo es s&oacute;lo para letras y numero'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'Minimo 3 y maximo 100 caracteres'
                    }
                }
            },
        	descripcion: {
                message: 'Campo obligatorio',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                    	regexp: alfanum,
                        message: 'El campo es s&oacute;lo para letras y numeros'
                    },
                    stringLength: {
                        min: 3,
                        max: 500,
                        message: 'Minimo 3 y maximo 50 caracteres'
                    }
                }
            }            
        }
    });		

});  //Fin de jquery