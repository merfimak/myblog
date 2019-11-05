<?php
namespace App\controllers;

use App\Models\Article;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class FeedbackController extends MainController
{
	

	public function actionHome()
	{		
	
		$msg = '';

		$mail = new PHPMailer(true);

		if(count($_POST) > 0){
			$email = htmlspecialchars(trim($_POST['email']));
			$name = htmlspecialchars(trim($_POST['name']));
			$text = htmlspecialchars(trim($_POST['text']));
			$dt = date("Y-m-d H:i:s");
			$message = $dt . ' ' . $name . ' оставил отзыв: ' . $text . ' его почта: ' . $email;

			

		if($name != '' && $text != '' && preg_match("/^[-0-9a-z_\.]+@[-0-9a-z^\.]+\.[a-z]{2,4}$/i",$email)){

			$mail->SMTPDebug = 0;
		    $mail->isSMTP();
			$mail->CharSet="UTF-8";
			$mail->SMTPSecure = 'tls';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->Username = 'merfimak3@gmail.com';
			$mail->Password = 'merfimak3i';
			$mail->SMTPAuth = true;

			$mail->setFrom('merfimak3@gmail.com');
			$mail->addAddress('fernankadrus@gmail.com');

			$mail->isHTML(true); 
			$mail->Subject = 'заголовок'; // Заголовок письма
			$mail->Body = $message; // Текст письма

			if (!$mail->send()) {
			    echo 'Mailer Error: '. $mail->ErrorInfo;
			} else {
			   $msg = 'письмо отправлено';
			   
			}

			
		}else{
			$msg = 'заполните все поля';
		}


	}
	
		$this->view->msg = $msg;	


		$this->finelDispaly();
	}


}