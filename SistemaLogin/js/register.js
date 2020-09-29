$(document).ready(function(){
	$("#register-form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			nombre : {
				required : true
			},
                        apellidop : {
				required : true
			},
                        apellidom : {
				required : true
			},
                        genero : {
				required : true
			},
                        edad : {
				required : true
			},
			estadocivil : {
				required : true
			},
                        correo : {
				required : true
			},
                        nivel : {
				required : true
			},
			password : {
				required : true
			},
			confirm_password : {
				required : true,
				equalTo: "#password"
			}
		},
		messages : {
			nombre : {
				required : "Por favor, introduzca su(s) nombre(s)"
			},
                        apellidop : {
				required : "Por favor, introduzca su apellido paterno"
			},
                        apellidom : {
				required : "Por favor, introduzca su apellido materno"
			},
			genero : {
				required : "Por favor, seleccione un g&eacute;nero"
			},
                        edad : {
				required : "Por favor, introduzca su edad"
			},
                        estadocivil : {
				required : "Por favor, seleccione su estado civil"
			},
                        correo : {
				required : "Por favor, introduzca su correo"
			},
                        nivel : {
				required : "Por favor, seleccione su nivel de interes"
			},
			password : {
				required : "Por favor, ingrese contraseña"
			},
			confirm_password : {
				required : "Introduzca confirmación de la contraseña",
				equalTo: "Contraseña y confirmación de contraseña no coinciden"
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});
});