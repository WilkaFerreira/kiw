<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

// Demais código de conexão e inserção de dados aqui


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

$conexao = conectaBanco('localhost', 'root', 'BemVindo!');

$sql = "INSERT INTO agendamento (nome, contato, dia_semana, horario, pagamento, num_cartao, data_validade, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssssssss", $nome, $contato, $dia_semana, $horario, $pagamento, $num_cartao, $data_validade, $cvv);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $stmt->error;
}

$stmt->close();
$conexao->close();

header("Location: servico.html");
exit;
?>
