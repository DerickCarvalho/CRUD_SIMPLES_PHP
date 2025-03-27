<?php
    require 'conn.php';

    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if ($id != null) {
        $stmt = $pdo->prepare("DELETE FROM filmes WHERE id = :id");

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        if($stmt->execute()) {
            header("Location: ../index.php");
            exit;
        }
        else {
            header("Location: ../index.php?error=yes");
            exit;
        }
    }
?>