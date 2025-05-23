<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nomePaciente = $_POST['nome'];
  $data = $_POST['data'];
  $horario = $_POST['horario'];
  $dentista = $_POST['dentista'];

  // Define os e-mails dos dentistas
  $emailsDentistas = [
    "yuri" => "yuri@clinica.com",
    "viviane" => "matheuspontes@cearabytes.com.br"
  ];

  // Nome completo para o corpo do e-mail
  $nomesDentistas = [
    "yuri" => "Dr. Yuri",
    "viviane" => "Dra. Viviane"
  ];

  if (!isset($emailsDentistas[$dentista])) {
    die("Dentista não encontrado.");
  }

  $to = $emailsDentistas[$dentista];
  $nomeDentista = $nomesDentistas[$dentista];

  $subject = "Novo Agendamento para $nomeDentista";
  $message = "Olá $nomeDentista,\n\nVocê recebeu um novo agendamento de consulta:\n\n👤 Nome do Paciente: $nomePaciente\n📅 Data: $data\n🕒 Horário: $horario\n👨‍⚕️ Dentista: $nomeDentista";
  $headers = "From: sistema@clinica.com";

  if (mail($to, $subject, $message, $headers)) {
    echo "<script>alert('Consulta agendada com sucesso!'); window.location.href='index.html';</script>";
  } else {
    echo "<script>alert('Erro ao enviar agendamento.'); window.history.back();</script>";
  }
}
?>
