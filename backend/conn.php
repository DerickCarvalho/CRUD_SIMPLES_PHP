<?php
    $host = "localhost";
    $dbname = "movie_list";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        //Definindo os atributos de configuração do PDO para que ele trate erros do DB como Exceptions.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Mostrando menssagem de sucesso caso a conexão com o banco funcione.
        // echo "Conexão com o banco realizada com sucesso!";
    } catch (PDOException $ex) {
        // Mostrando menssagem de erro caso a conexão com o banco falhe.
        // die("Erro na conexão com o banco: " . $ex->getMessage());
    }
?>