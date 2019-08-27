<?php
// Destinatário 
$para = "sac@mlibanocontabil.com.br"; 
 
// Assunto do e-mail 
$assunt = "Contato do através do site ..."; 
 
// Campos do formulário de contato 
$nome = $_POST['nome']; 
$email = $_POST['email']; 
$assunto = $_POST['assunto']; 
$mensagem = $_POST['conteudo']; 
 
// Monta o corpo da mensagem com os campos 
$corpo = "<html><body>"; 
$corpo .= "Nome: $nome "; 
$corpo .= "Email: $email Assunto: $assunto Mensagem: $mensagem"; 
$corpo .= "</body></html>"; 
 
// Cabeçalho do e-mail 
$email_headers = implode("\n", array("From: $nome", "Reply-To: $email", "Subject: $assunt", "Return-Path: $email", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8")); 
 
if (!empty($nome) && !empty($email) && !empty($mensagem)) { 
    mail($para, $assunt, $corpo, $email_headers); 
    $msg = "Sua mensagem foi enviada com sucesso."; 
} else { 
    $msg = "Erro ao enviar a mensagem."; 
 
} 
?>
