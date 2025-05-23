<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $data = $_POST['data'];
  $horario = $_POST['horario'];
  $dentista = $_POST['dentista'];

  $to = "matheuspontes@cearabytes.com.br";
  $subject = "Novo Agendamento de Consulta";
  $message = "Nova consulta agendada:\nData: $data\nHorário: $horario\nDentista: $dentista";
  $headers = "From: sistema@clinica.com";

  if(mail($to, $subject, $message, $headers)){
    echo "Email enviado com sucesso!";
  } else {
    echo "Falha ao enviar email.";
  }
}
?>
