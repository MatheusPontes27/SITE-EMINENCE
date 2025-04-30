<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensagem = trim($_POST["mensagem"]);

    if (empty($nome) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($mensagem)) {
        echo "Preencha todos os campos corretamente.";
        exit;
    }

    // Altere este e-mail para o e-mail que você deseja receber as mensagens
    $destinatario = "matheuspontes@cearabytes.com.br";
    $assunto = "Nova mensagem do site";
    
    $corpoEmail = "Nome: $nome\n";
    $corpoEmail .= "Email: $email\n\n";
    $corpoEmail .= "Mensagem:\n$mensagem\n";

    $cabecalhos = "From: $nome <$email>";

    if (mail($destinatario, $assunto, $corpoEmail, $cabecalhos)) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Erro ao enviar. Tente novamente.'); window.history.back();</script>";
    }
} else {
    echo "Método inválido.";
}
?>