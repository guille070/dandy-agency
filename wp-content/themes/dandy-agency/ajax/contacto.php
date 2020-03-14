<?php
	require('../php/class.phpmailer.php');
	
	$nombre=$_POST['nombre'];
	$mail=strtolower($_POST['mail']);
	$mensaje=$_POST['mensaje'];
	
	utf8_encode($nombre);
	utf8_encode($mensaje);
	
	if( (!empty($nombre)) && preg_match('/\w/', $nombre) && (!empty($mail)) && preg_match('/\w/', $mail) && (!empty($mensaje)) && preg_match('/\w/', $mensaje) ){	
	
		$direccion_envio = 'contact@wearedandy.com';
		$email = new PHPMailer();
	
		//configuro la clase PHPMailer
		//$name='Dandy Agency';
		//$subject="wearedandy.com"; // WEB
		$email->From     = $mail;
		$email->FromName = $nombre;
		$email->AddAddress($direccion_envio); 
		$email->Subject = "Contact - www.wearedandy.com";
		$email->AddReplyTo($mail, $nombre);
		$email->IsHTML(true); 
		
		//armamos el HTML que llega al mail
		$contenido = '<html><body>';
	    $contenido = '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>';
		$contenido .= '<table width="400" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">';
		$contenido .= '<tr>';
		$contenido .= '<td height="20"><strong>Nombre:</strong> '.$nombre.'</td>';
		$contenido .= '</tr>';
		$contenido .= '<tr>';
		$contenido .= '<td height="20"><strong>Email:</strong> '.$mail.'</td>';
		$contenido .= '</tr>';
		$contenido .= '<tr>';
		$contenido .= '<td height="20"><strong>Mensaje:</strong> '.nl2br($mensaje).'</td>';
		$contenido .= '</tr>';
		$contenido .= '</table>';
		$contenido .= '</body></html>';
	
		$email->Body = $contenido;
	
		$email->Send();
		
	    echo 'sucess';
    }else{
		echo 'error';
	}
	
?>