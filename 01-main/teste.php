<?php

function conectaBanco($servidor, $usuario, $senha) {
    $bancoDeDados = 'barbe';
    $conexao = new mysqli($servidor, $usuario, $senha, $bancoDeDados);
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }
    return $conexao;
}

$nome = $_POST['nome'];
$contato = $_POST['contato'];
$dia_semana = $_POST['dia_semana'];
$horario = $_POST['horario'];
$pagamento = $_POST['pagamento'];
$num_cartao = $_POST['num_cartao']; // Adicionado
$data_validade = $_POST['data_validade']; // Adicionado
$cvv = $_POST['cvv']; // Adicionado

$conexao = conectaBanco('localhost', 'root', 'BemVindo');

$sql = "INSERT INTO agendamento (nome, contato, dia_semana, horario, pagamento, num_cartao, data_validade, cvv) 
        VALUES ('$nome', '$contato', '$dia_semana', '$horario', '$pagamento', '$num_cartao', '$data_validade', '$cvv')";

if ($conexao->query($sql) === TRUE) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $conexao->error;
}

$conexao->close();

header("Location: servico.html");
exit;
?>
