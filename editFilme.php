<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/imgs/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/DerickCarvalho/DkStrap@main/DkStrap.css">
    <link rel="stylesheet" href="./assets/css/editFilme.css">
    <title>Movie List - Add Filme</title>
</head>
<body class="ubuntu-regular">
    <header class="flex-row-space-between">
        <section class="logo flex-row-center">
            <img src="./assets/imgs/logo.png" alt="">
            <h1>Movie List</h1>
        </section>
        <nav class="flex-row-center">
            <a href="./index.html">Lista de Filmes</a>
        </nav>
    </header>

    <main class="flex-column-center">
        <div id="error-message" class="error-message hidden">
            Ocorreu um erro interno!
        </div>

        <form class="flex-column-center" action="./backend/editFilme.php" method="POST">
            <div style="width: 90%; padding: 10px 0; font-size: 22px;">
                <h3>Editar Filme</h3>
            </div>

            <?php
                require './backend/conn.php';
                
                $id = isset($_GET['id']) ? $_GET['id'] : null;

                if ($id != null) {
                    $stmt = $pdo->prepare("SELECT * FROM filmes WHERE id = :id");
                    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
                    $stmt->execute();
                    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                    echo "<input value=" . $resultado['nome'] . " class=\"default-input\" type=\"text\" name=\"nome\" id=\"nome\" placeholder=\"Nome do filme\">";
                    echo "<input value=" . $resultado['lancamento'] . " class=\"default-input\" type=\"number\" name=\"lancamento\" id=\"lancamento\" placeholder=\"Ano de Lançamento\" min=\"0\" onkeypress=\"return event.key !== '-'\">";
                    echo "<input value=" . $resultado['genero'] . " class=\"default-input\" type=\"text\" name=\"genero\" id=\"genero\" placeholder=\"Gênero do filme\">";
                    echo "<input value=" . $resultado['id'] . " type=\"hidden\" name=\"id\" id=\"id\">";
                }
                else {
                    header("Location: ../index.php");
                    exit;
                }
            ?>            

            <input class="button" type="submit" value="Salvar">
        </form>
    </main>

    <script src="./assets/js/editFilme.js"></script>
</body>
</html>