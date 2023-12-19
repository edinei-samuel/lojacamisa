<?php
// Conexão com o banco de dados
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "fakeshoes";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recupera os valores do formulário
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$cpf = $_POST['cpf'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha para segurança

// Insere os valores na tabela usuario
$sql = "INSERT INTO usuario (nome, usuario, cpf, senha) VALUES ('$nome', '$usuario', '$cpf', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
