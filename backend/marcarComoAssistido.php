<?php
    require 'conn.php';

    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if ($id != null) {
        $stmt = $pdo->prepare("UPDATE filmes SET assistido = :assistido WHERE id = :id");

        $stmt->bindValue(":assistido", true, PDO::PARAM_BOOL);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        if($stmt->execute()) {
            header("Location: ../index.php");
            exit;
        }
        else {
            header("Location: ../addFilme.html?error=yes");
            exit;
        }
    }
?>