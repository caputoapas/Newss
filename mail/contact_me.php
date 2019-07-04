<?php
//estudar funcao each e substituir pois esta obsoleta no php 7
require_once("../PHPMailer/class.phpmailer.php");
$mail = new PHPMailer(true);//usar classe para enviar email
$mail->IsSMTP();


// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   

// $to = 'caputoapas@gmail.com'; 
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
// $headers = "From: noreply@yourdomain.com\n"; 
// $headers .= "Reply-To: $email_address"; 


$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPSecure = 'ssl';// Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
$mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
$mail->Port       = 465; //  Usar 587 porta SMTP
$mail->Username = 'caputoapas@gmail.com'; // Usuário do servidor SMTP (endereço de email)
$mail->Password = '02098321'; // Senha do servidor SMTP (senha do email usado)
  
$mail->SetFrom('caputoapas@gmail.com', 'NewSS'); //Seu e-mail
$mail->AddReplyTo('caputoapas@gmail.com', 'NewSS'); //Seu e-mail

$mail->AddAddress('caputoapas@hotmail.com');

$mail->MsgHTML('<h1>Mensagem Recebida</h1>'
.'<b>Dados do Contato</b><br>'
.'<b>Nome:</b> '.$name.'<br>'
.'<b>Email:</b> '.$email_address.'<br>'
.'<p>O usuario escreveu</p>'
.$message); 
$mail->Subject = 'Assunto: Contato Realizado por ' .$name;

$mail->Send();

//mail($to,$email_subject,$email_body,$headers);
return true;         
?>