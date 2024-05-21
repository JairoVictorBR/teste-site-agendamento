<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Agendamento - barbearia BLACKSKUL</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Adicionando Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="text-center my-4">
            <h1>Página de Agendamento - BLACKSKUL Barbearia</h1>
            <p>Registros de agendamento:</p>
        </header>

        <section class="registros">
            <?php
            // Conexão com o banco de dados
            $servername = "127.0.0.1";
            $username = "barbeariauser";
            $password = "XiqtQYuLDQ!AwvMc";
            $dbname = "barbeariaagendar";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Consulta SQL para selecionar todos os registros
            $sql = "SELECT * FROM agendamento";
            $result = $conn->query($sql);

            if ($result === false) {
                die("Erro na consulta SQL: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                // Exibir os registros em uma tabela
                echo "<div class='table-responsive'>";
                echo "<table class='table table-striped table-bordered'>";
                echo "<thead class='thead-dark'>";
                echo "<tr><th>ID</th><th>Nome</th><th>Telefone</th><th>Dia da semana</th><th>Serviço</th><th>Tempo</th><th>Preço</th><th>Data do agendamento</th><th>Horário do agendamento</th></tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["telefone"] . "</td>";
                    echo "<td>" . $row["dia_semana"] . "</td>";
                    echo "<td>" . $row["servico"] . "</td>";
                    echo "<td>" . $row["tempo"] . "</td>";
                    echo "<td>" . $row["preco"] . "</td>";
                    echo "<td>" . $row["data_agendamento"] . "</td>";
                    echo "<td>" . $row["horario"] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "Nenhum registro encontrado.";
            }
            $conn->close();
            ?>
        </section>
    </div>

    <!-- Adicionando Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
