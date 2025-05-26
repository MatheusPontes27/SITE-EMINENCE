<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura e sanitiza os dados
    $nome = htmlspecialchars(trim($_POST['nome']));
    $data = htmlspecialchars(trim($_POST['data']));
    $horario = htmlspecialchars(trim($_POST['horario']));
    $dentista = htmlspecialchars(trim($_POST['dentista']));

    // Define os e-mails dos dentistas
    switch ($dentista) {
        case "Dr. Yuri":
            $to = "yurilins@clinicaeminence.com.br";
            break;
        case "Dra. Viviane":
            $to = "vivianecosta@clinicaeminence.com.br";
            break;
        default:
            $to = "geral@clinica.com"; // fallback
            break;
    }

    // Assunto e corpo do e-mail
    $subject = "Novo Agendamento de Consulta - $dentista";
    $message = "Nova consulta agendada:\n\n" .
               "👤 Nome do Paciente: $nome\n" .
               "📅 Data: $data\n" .
               "⏰ Horário: $horario\n" .
               "🦷 Dentista: $dentista";
    $headers = "From: agendamento@clinica.com\r\n";
    $headers .= "Reply-To: agendamento@clinica.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envia o e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Agendamento enviado com sucesso!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Erro ao enviar o agendamento. Tente novamente.'); window.history.back();</script>";
    }
} else {
    // Bloqueia acessos indevidos
    header("Location: index.html");
    exit();
}
