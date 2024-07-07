<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Home | iRead</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    :root {
        --roxo: #4F30FF;
    }

    ::selection {
        background-color: var(--roxo);
        color: #fff;
    }

    body{
        font-family: "Poppins", sans-serif;
        margin: 0;
    }

    header{
        background-color: var(--roxo);
        display: flex;
        flex-direction: row;
        padding: 5px 15px;
        justify-content: space-between;
        align-items: center;
    }

    h1{
        font-size: 20px;
        color:#fff;
    }

    nav a{
        text-decoration: none;
        color: #fff;
        padding: 0px 5px;
        transition: 0.3s;
    }

    nav a:first-child{
        border-right: 1px solid #c4c4c4;
    }

    nav a:hover{
        font-weight: bolder;
    }

    #titulo {
        width: 90%;
        padding: 20px 5% 20px 5%;
    }

    h2{
        margin: 0;
        text-transform: uppercase;
        padding-left: 10px;
        border-bottom: 1px solid var(--roxo);
    }
    #livros {
        max-width: 90%;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        
        position: relative;
        left: 50%;
        transform: translate(-50%, 0%);
    }
    .livro {
        width: 200px;
        height: auto;
        cursor: pointer;
        padding: 5px;
        border-radius: 10px;
        box-shadow: 0px 0px 29px -14px rgba(0,0,0,0.3);
        transition: 0.3s;
        margin-bottom: 30px;
    }
    .livro:hover {
        box-shadow: 0px 0px 29px -14px rgba(0,0,0,0.5);
        rotate: 1deg;
    }
    .livro img{
        width: 100%;
        border-radius: 10px 10px 0px 0px;
    }

    .livro a{
        text-decoration: none;
        color: #000;
        font-weight: bold;
        font-size: 20px;
        transition: 0.3s;
    }
    .livro a:hover{
        color: var(--roxo);
    }

    .livro .capa {
        max-width: 200px;
    }

    .livro p {
        margin: 0;
        text-align: justify;
    }

    .livro .desc {
        padding-bottom: 15px;
    }

    .livro ~ .nota {
        text-align: start;
    }

    footer {
        width: 100%;
        background-color: #000;
        color: #fff;
        height: 100%;
    }

    footer p {
        margin: 0;
        padding: 10px;
        text-align: center;
        
    }

    footer a{
        text-decoration: none;
        color: var(--roxo);
    }

    @media screen and (max-width: 576px) {
        #menu {
            display: block;
        }
        #livros {
            width: 100%;
        }
        .livro {
            width: 40%;
        }

        .livro .desc {
            text-align: start;
        }

    }
</style>
<body>
    <header>
        <h1 class="logo">iRead</h1>
        <nav class="">
            <a href="livros/busca.html">Buscar Livro</a>
            <a href="sistema/login.php">Login</a>
        </nav>
    </header>

    <main>
        <div id="titulo">
            <h2>Livros em Destaque</h2>
        </div>
        
        <div id="livros">
            <?php
                include_once('php/config.php');
                $maxLivros = 5;
            
                $numeros = array(0, 0, 0, 0, 0);
                $numeros[0] = rand(1, 7);
                for($i = 1; $i < $maxLivros; $i++) {
                    $numeros[$i] = rand(1, 7);
                    for($h = 0; $h < $i; $h++) {
                        while($numeros[$i] == $numeros[$h]) $numeros[$i] = rand(1,7);
                    }
                }

                for($i = 0; $i < $maxLivros; $i++) {
                    $sql = "SELECT * FROM livro WHERE codigo = $numeros[$i]"; 
                    $result = mysqli_query($conexao, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $arquivo = "livros/imagens/" . $row["capa"];
                    $id = $row['idLivro'];
                    $nome = $row['nome'];
                    $autor = $row['autor'];
                    $cat = $row['categoria'];


                    echo "<div class=\"livro\">
                            <img class=\"capa\" src=\"$arquivo\"/>
                            <a href=\"livros/exibirLivro.php?id=$id\">$nome</a>
                            <div class=\"area-textos\">
                                <p class=\"desc\">$autor</p>
                            </div>
                        </div>";
                }
            ?>
        </div>

    </main>

    <footer>
        <p>O <a href="#">iRead</a> é um projeto autônomo em fase de desenvolvimento.</p>
    </footer>
</body>
</html>