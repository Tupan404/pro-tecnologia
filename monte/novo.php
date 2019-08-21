<!-- Layout --> 
<?php
  
  /* Valores recebidos do formulário  */
  $cnh = $_FILES['cnh'];
  $arquivo = $_FILES['arquivo'];
  $nome = $_POST['nome'];
  $assunto = $_POST['assunto'];
   
  /* Destinatário e remetente - EDITAR SOMENTE ESTE BLOCO DO CÓDIGO */
  $to = "desenvolvimento@whprotecnologia.com";
  $remetente = "desenvolvimento@whprotecnologia.com"; // Deve ser um email válido do domínio
   
  /* Cabeçalho da mensagem  */
  $boundary = "XYZ-" . date("dmYis") . "-ZYX";
  $headers = "MIME-Version: 1.0\n";
  $headers.= "From: $remetente\n";
  $headers.= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";  
  $headers.= "$boundary\n"; 
   
  /* Layout da mensagem  */
  $corpo_mensagem = " 
  <br>XML envia pelo site
  <br>--------------------------------------------<br>
  <br><strong>Nome:</strong> $nome
  <br><strong>Empresa:</strong> $assunto
  <br><br>--------------------------------------------
  ";

  $numeroCampos = 2;
  // Tamanho máximo do arquivo (em bytes)
  $tamanhoMaximo = 1000000;
  // Extensões aceitas
  $extensoes = array(".jpeg", ".jpg", ".png");
  // Caminho para onde o arquivo será enviado
  $caminho = "uploads/";
  // Substituir arquivo já existente (true = sim; false = nao)
  $substituir = false;
   
  for ($i = 0; $i < $numeroCampos; $i++) {
      
      // Informações do arquivo enviado
      $nomeArquivo = $_FILES["arquivo"]["name"][$i];
      $tamanhoArquivo = $_FILES["arquivo"]["size"][$i];
      $nomeTemporario = $_FILES["arquivo"]["tmp_name"][$i];
    
      
          // Se não houver erro
          if (!$erro) {
              // Move o arquivo para o caminho definido
              move_uploaded_file($nomeTemporario, ($caminho . $nomeArquivo));
              // Mensagem de sucesso
              echo "O arquivo <b>".$nomeArquivo."</b> foi enviado com sucesso. <br />";
          } 
          // Se houver erro
          else {
              // Mensagem de erro
              echo $erro . "<br />";
          }
      }
  

  /* Função que envia a mensagem  */
  if(mail($to, $assunto, $mensagem, $mensagem, $headers))
  {
   echo "<br><br><center><b><font color='green'>Mensagem enviada com sucesso!";
  } 
   else
   {
   echo "<br><br><center><b><font color='red'>Ocorreu um erro ao enviar a mensagem!";
  }
  ?>