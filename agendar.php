<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root"; // ou seu usuário do MySQL
$password = ""; // sua senha
$dbname = "clinica_agendamentos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

include 'conexao.php';

// Recebendo dados do formulário
$data = $_POST['data'];
$horario = $_POST['horario'];
$dentista = $_POST['dentista'];

// Verifica se o horário já está reservado
$sql_verifica = "SELECT * FROM agendamentos WHERE data = ? AND horario = ? AND dentista = ?";
$stmt = $conn->prepare($sql_verifica);
$stmt->bind_param("sss", $data, $horario, $dentista);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Horário já reservado.";
} else {
    // Inserir no banco de dados
    $sql = "INSERT INTO agendamentos (data, horario, dentista) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $data, $horario, $dentista);

    if ($stmt->execute()) {
        echo "Agendamento realizado com sucesso.";
    } else {
        echo "Erro ao agendar: " . $stmt->error;
    }
}

$conn->close();
?>


