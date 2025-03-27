<?php
    require 'conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
        $lancamento = isset($_POST['lancamento']) ? trim($_POST['lancamento']) : '';
        $genero = isset($_POST['genero']) ? trim($_POST['genero']) : '';

        // Testar se variáveis estão sendo recebidas
        // echo "Nome do filme: " . $nome . "<br>";
        // echo "Ano de lançamento: " . $lancamento . "<br>";
        // echo "Gênero: " . $genero . "<br>";

        $stmt = $pdo->prepare("INSERT INTO filmes (nome, genero, lancamento, assistido) VALUES (:nome, :genero, :lancamento, false)");
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":lancamento", $lancamento);
        $stmt->bindParam(":genero", $genero);

        if ($stmt->execute()) {
            header("Location: ../index.php");
            exit;
        }
        else {
            header("Location: ../addFilme.html?error=yes");
            exit;
        }
    }
    else {
        header("Location: ../addFilme.html?error=yes");
        exit;
    }

    // echo 'EU PRESTO';
?>