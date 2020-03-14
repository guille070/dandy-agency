<?php
global $q_config;
?>

<script type="text/javascript">
	function validateEmail(email) { 
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
	
	jQuery(document).ready(function($) {
		$('#enviar').click(function(e){
			e.preventDefault();
			button_html = jQuery(this);
			$('.error-form-msg, .error-mail-msg').hide();
			
			nombre = $('form #nombre').val();
			email = $('form #mail').val();
			mensaje = $('form #mensaje').val();
			fake_mail = $('form #fake_mail').val();
			
			if (fake_mail!==''){ return false; }
			if ( nombre=='Name*' || nombre=='Nombre*' || mensaje=='Comments*' || mensaje=='Mensaje*' ) {
				$('.error-form-msg').fadeIn();
			} else {
				if( validateEmail(email) ) { 
					<?php if ($q_config['language']=='es') { ?>
						button_html.text('Enviando...');
					<?php } ?>
					<?php if ($q_config['language']=='en') { ?>
						button_html.text('Sending...');
					<?php } ?>
										
					var loadUrl = "<?php echo get_template_directory_uri(); ?>/ajax/contacto.php";
					$.post(loadUrl,{
						nombre:nombre,
						mail:email,
						mensaje:mensaje
					}, function(data){
						if(data=='sucess'){
							$('.error-form-msg, .error-mail-msg').hide();
							$('.contacto .holderSec form').hide();
							$('.sucess-form-msg').fadeIn();
							<?php if ($q_config['language']=='es') { ?>
								button_html.text('Enviar');
							<?php } ?>
							<?php if ($q_config['language']=='en') { ?>
								button_html.text('Send');
							<?php } ?>
						}else{
							//alert(data);
							$('.sucess-form-msg').hide();
							$('.error-form-msg').fadeIn();
							<?php if ($q_config['language']=='es') { ?>
								button_html.text('Enviar');
							<?php } ?>
							<?php if ($q_config['language']=='en') { ?>
								button_html.text('Send');
							<?php } ?>
						}
					});
					
				} else {
					$('.error-mail-msg').fadeIn(); 
				}
			}
		});
	});
</script>

<?php
//Labels
if ($q_config['language']=='es') {
	$labelNombre = 'Nombre*';
	$labelComentarios = 'Mensaje*';
	$labelEnviar = 'Enviar';
	$labelError = 'Todos los campos deben ser completados.';
	$labelErrorMail = 'El mail ingresado es incorrecto.';
	$labelSucess = 'Mensaje enviado.';
	$labelEnviar = 'Enviar';
} 
if ($q_config['language']=='en') {
	$labelNombre = 'Name*';
	$labelComentarios = 'Comments*';
	$labelEnviar = 'Send';
	$labelError = 'All fields must be completed.';
	$labelErrorMail = 'Mail incorrect.';
	$labelSucess = 'Message sent.';
	$labelEnviar = 'Send';
} ?>

<form action="" class="contact-form">
	<input type="text" value="<?php echo $labelNombre; ?>" id="nombre" name="nombre" onfocus="if(this.value=='<?php echo $labelNombre; ?>'){this.value='';}" onblur="if(this.value==''){this.value='<?php echo $labelNombre; ?>';}" />
	<input type="mail" value="Email*" id="mail" name="mail" onfocus="if(this.value=='Email*'){this.value='';}" onblur="if(this.value==''){this.value='Email*';}" />
	<input type="text" id="fake_mail" name="fake_mail" value="" />
	<div class="clearfix"></div>
	<textarea id="mensaje" name="mensaje" onfocus="if(this.value=='<?php echo $labelComentarios; ?>'){this.value='';}" onblur="if(this.value==''){this.value='<?php echo $labelComentarios; ?>';}"><?php echo $labelComentarios; ?></textarea>
	<div class="required">
		<?php if ($q_config['language']=='es') { ?>
			*Todos los campos son obligatorios
		<?php } ?>
		<?php if ($q_config['language']=='en') { ?>
			*Required fields
		<?php } ?>
	</div>
	<button id="enviar"><?php echo $labelEnviar; ?></button>
	<div class="error-mail-msg"><?php echo $labelErrorMail; ?></div>
	<div class="error-form-msg"><?php echo $labelError; ?></div>
	<div class="sucess-form-msg"><?php echo $labelSucess; ?></div>
</form>