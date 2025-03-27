<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/imgs/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/DerickCarvalho/DkStrap@main/DkStrap.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title>Movie List - Home</title>
</head>
<body class="ubuntu-regular">
    <header id="logo" class="flex-row-space-between">
        <section class="logo flex-row-center">
            <img src="./assets/imgs/logo.png" alt="">
            <h1>Movie List</h1>
        </section>
        <nav class="flex-row-center">
            <a href="./addFilme.html">Adicionar Filme</a>
        </nav>
    </header>

    <main class="flex-column-center">        
        <div id="error-message" class="error-message hidden">
            Ocorreu um erro interno!
        </div>

        <?php
            require './backend/conn.php';

            $stmt = $pdo->prepare("SELECT * FROM filmes");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($resultados) {
                echo "<table class=\"movie-list\">";
                echo    "<tr>";
                echo        "<th>#</th>";
                echo        "<th>Nome</th>";
                echo        "<th>Gênero</th>";
                echo        "<th>Lançamento</th>";
                echo        "<th>Status</th>";
                echo        "<th>Opções</th>";
                echo    "</tr>";

                $indice = 0;

                foreach ($resultados as $resultado) {
                    $indice++;
                    $status = $resultado['assistido'] == true ? 'ASSISTIDO' : 'NÃO ASSISTIDO';
                    echo "<tr>";
                    echo    "<td>$indice</td>";
                    echo    "<td>" . $resultado['nome'] ."</td>";
                    echo    "<td>" . $resultado['genero'] . "</td>";
                    echo    "<td>" . $resultado['lancamento'] . "</td>";
                    echo    "<td>$status</td>";
                    echo    "<td>";

                    if ($status == "ASSISTIDO") {
                        echo        "<button style=\"background-color: #CCCCCC; transform: none; box-shadow: none;\">Assistido</button>";
                    }
                    else {
                        echo        "<button onclick=\"marcarComoAssistido(". $resultado['id'] .")\" style=\"background-color: #148600;\">Assistido</button>";
                    }
                    echo        "<button onclick=\"editarFilme(". $resultado['id'] . ")\" style=\"background-color: #ffcc00;\">Editar</button>";
                    echo        "<button onclick=\"excluirFilme(". $resultado['id'] . ")\" style=\"background-color: #d10000;\">Excluir</button>";
                    echo    "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }
            else {
                echo "<h2 style=\"margin-top: 50px;\">NENHUM FILME ADICIONADO À LISTA ATÉ O MOMENTO</h2>";
            }
        ?>
        
    </main>

    <script src="./assets/js/index.js"></script>
</body>
</html>