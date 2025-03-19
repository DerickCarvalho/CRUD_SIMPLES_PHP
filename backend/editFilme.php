<?php
    require 'conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
        $lancamento = isset($_POST['lancamento']) ? trim($_POST['lancamento']) : '';
        $genero = isset($_POST['genero']) ? trim($_POST['genero']) : '';
        $id = isset($_POST['id']) ? trim($_POST['id']) : '';

        // Testar se variáveis estão sendo recebidas
        // echo "Nome do filme: " . $nome . "<br>";
        // echo "Ano de lançamento: " . $lancamento . "<br>";
        // echo "Gênero: " . $genero . "<br>";
        // echo "Id: " . $id . "<br>";

        $stmt = $pdo->prepare("UPDATE filmes SET nome = :nome, genero = :genero, lancamento = :lancamento WHERE id = :id");
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":lancamento", $lancamento);
        $stmt->bindParam(":genero", $genero);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ../index.php");
            exit;
        }
        else {
            header("Location: ../editFilme.php?id=$id&error=yes");
            exit;
        }
    }
    else {
        header("Location: ../editFilme.php?id=$id&error=yes");
        exit;
    }
?>