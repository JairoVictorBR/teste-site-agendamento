<?php
$servername = "127.0.0.1";
$username = "barbeariauser";
$password = "XiqtQYuLDQ!AwvMc";
$dbname = "barbeariaagendar";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $data_agendamento = $_POST['data_agendamento'];
    $servico = $_POST['servico'];
    $tempo = $_POST['tempo'];
    $preco = $_POST['preco'];
    $horario = $_POST['horario'];

    // Extrair apenas a data da string recebida
    $data_agendamento = date('Y-m-d', strtotime($data_agendamento));

    // Calcular o nome do dia da semana para a data de agendamento em português
    $dia_semana = strftime('%A', strtotime($data_agendamento));

    // Traduzir para português
    switch ($dia_semana) {
        case 'Monday':
            $dia_semana = 'Segunda-feira';
            break;
        case 'Tuesday':
            $dia_semana = 'Terça-feira';
            break;
        case 'Wednesday':
            $dia_semana = 'Quarta-feira';
            break;
        case 'Thursday':
            $dia_semana = 'Quinta-feira';
            break;
        case 'Friday':
            $dia_semana = 'Sexta-feira';
            break;
        case 'Saturday':
            $dia_semana = 'Sábado';
            break;
        case 'Sunday':
            $dia_semana = 'Domingo';
            break;
        default:
            break;
    }

    // Inserir dados no banco de dados
    $sql = "INSERT INTO agendamento (nome, telefone, data_agendamento, dia_semana, servico, tempo, preco, horario) VALUES ('$nome', '$telefone', '$data_agendamento', '$dia_semana', '$servico', '$tempo', '$preco', '$horario')";

    if ($conn->query($sql) === TRUE) {
        echo "Agendamento realizado com sucesso!";
        // Redirecionamento após 2 segundos
        echo "<script>setTimeout(function() { window.location.href = 'index.html'; }, 2000);</script>";
    } else {
        echo "Erro ao agendar: " . $conn->error;
    }
}

$conn->close();
?>
