$(document).ready(function(){
	$("#login-form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			correo : {
				required : true
			},
			password : {
				required : true
			}
		},
                
                messages : {
			correo : {
				required : "Por favor, introduzca su correo"
			},
			password : {
				required : "Por favor, ingrese su contraseña"
			}
                        },
		errorPlacement : function(error, element) {
			$(element).removeClass('has-success').addClass('has-error');
		},
		highlight : function(element) {
			$(element).removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).removeClass('has-error').addClass('has-success');
		}
	});
	
	
});