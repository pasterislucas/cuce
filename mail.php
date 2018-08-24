<?php
//de donde la tengamos importamos la clase
require("class.phpmailer.php");
 
 			

        //creamos una instancía de la clase phpmailer
		 
      	$mail = new PHPMailer();
 		$mail->SMTPDebug = false;
        $mail->IsHTML(true); // si es html o txt
        $mail->CharSet = 'UTF-8';
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';//smpt de nuestro correo
        $mail->SMTPAuth = true; //por si necesita auentificación
        $mail->Port=465;
        $mail->SMTPSecure='ssl';
        $mail->Username = 'email@gmail.com';
        $mail->Password = 'pass';
        $mail->From = "martinbournonville.utnfrt@gmail.com";
        $mail->FromName = "Hola";
        $mail->Subject = "Prueba de Envio de Mail";
        $mail->AddAddress("hola@gmail.com");//el email al que vá
        $body  = "Prueba<br><br>";
        $body.=  "Prueba<br><br> ";
        $body.= " Prueba<br><br> ";
 
        $mail->Body = $body;//cogemos el cuerpo completo
 
        //Usamos AltBody por si el el correo no admite formato html
        $Altbody  = "Prueba";
        $Altbody  .=  "Prueba";
        $Altbody  .= " Prueba";
        $mail->AltBody = $Altbody;
 

        //envíamos el email al usuario
        $exito=$mail->Send();
		if($exito){
		echo "El correo fue enviado correctamente.";

        header("location: alarma.php");
		}else{
		echo "Hubo un inconveniente. Contacta a un administrador";
		}
    


?>