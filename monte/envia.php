<!-- Layout --> 
<?php
  
  /* Valores recebidos do formulário  */
  $arquivo = $_FILES['arquivo'];
  $nome = $_POST['nome'];
  $assunto = $_POST['assunto'];
   
  /* Destinatário e remetente - EDITAR SOMENTE ESTE BLOCO DO CÓDIGO */
  $to = "montelibano.nfe@dominioboxe.com.br, sac@mlibanocontabil.com.br";
  $remetente = "montelibano.nfe@dominioboxe.com.br, sac@mlibanocontabil.com.br"; 
   // Deve ser um email válido do domínio
   
  /* Cabeçalho da mensagem  */
  $boundary = "XYZ-" . date("dmYis") . "-ZYX";
  $headers = "MIME-Version: 1.0\n";
  $headers.= "From: $remetente\n";
  $headers.= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";  
  $headers.= "$boundary\n"; 
   
  /* Layout da mensagem  */
  $corpo_mensagem = " 
  
    <hr class=my-4>
    <strong><h1 style=color:#003B7A>XML enviado pelo site </h1></strong>                  
    <hr class=my-4>
    <h3 style=color:#003B7A>Nome: $nome </h3>
    <h3 style=color:#003B7A>Empresa: $assunto</h3> 
    <hr>             
  
  ";
   
  /* Função que codifica o anexo para poder ser enviado na mensagem  */
  if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){
   
      $fp = fopen($_FILES["arquivo"]["tmp_name"],"rb"); // Abri o arquivo enviado.
   $anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"])); // Le o arquivo aberto na linha anterior
   $anexo = base64_encode($anexo); // Codifica os dados com MIME para o e-mail 
   fclose($fp); // Fecha o arquivo aberto anteriormente
      $anexo = chunk_split($anexo); // Divide a variável do arquivo em pequenos pedaços para poder enviar
      $mensagem = "--$boundary\n"; // Nas linhas abaixo possuem os parâmetros de formatação e codificação, juntamente com a inclusão do arquivo anexado no corpo da mensagem
      $mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
      $mensagem.= "Content-Type: text/html; charset=\"utf-8\"\n\n";
      $mensagem.= "$corpo_mensagem\n"; 
      $mensagem.= "--$boundary\n"; 
      $mensagem.= "Content-Type: ".$arquivo["type"]."\n";  
      $mensagem.= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n";  
      $mensagem.= "Content-Transfer-Encoding: base64\n\n";  
      $mensagem.= "$anexo\n";  
      $mensagem.= "--$boundary--\r\n"; 
  }
   else // Caso não tenha anexo
   {
   $mensagem = "--$boundary\n"; 
   $mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
   $mensagem.= "Content-Type: text/html; charset=\"utf-8\"\n\n";
   $mensagem.= "$corpo_mensagem\n";
  }
   
  /* Função que envia a mensagem  */
  if(mail($to, $assunto, $mensagem, $headers))
  {
    // echo "<br> <br><center><b><font color='greend'></font>/Enviado com sucesso !";
    } 
   else
   {
  //  echo "<br><br><center><b><font color='red'>Ocorreu um erro ao enviar a mensagem!";
  }
  ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Monte Libano</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  
  <link href="img/icon/topo.png" rel="icon">
  <link href="img/icon/topo.png" type="image/x-icon" rel="icon" />
<link href="img/icon/topo.png" type="image/x-icon" rel="shortcut icon" />
<link href="img/icon/topo.png" rel="apple-touch-icon" />


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/util.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>


<body> 
<div class="container-fluid">
        <div class="row">
            <div class="col-7 offset-2">
            <br> <br>
                <div class="jumbotron">  <br> <br>
                  
                      <h3 class="display-4 text-center" style="color: #003B7A">Monte Líbano Contábil</h3>
                      <br>
                    <hr class="my-5">
                    <h4 class="text-center" style="color: #003B7A">XML enviado com Sucesso !! &nbsp; <img src="img/icon/success1.png" style="width: 40px; height: 40px;"></h4>
                <br> <br>
                <a class="text-primary" href="index.html"><img src="img/icon/back.png" alt=""></a> <br> <p style="color: #003B7A">Home</p> 
               <img src="img/icon/topo1.png" class="float-right" style="width: 80px; height: 80px;"> 
                 <br> 

                  </div>

            </div>
        </div>
    </div>
  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script src="js/map-custom.js"></script>

</body>
</html>