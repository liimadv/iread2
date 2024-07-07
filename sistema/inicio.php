<?php
    session_start();
    if((!isset($_SESSION['email']) == true) || (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Principal</title>
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

    body {
        margin: 0;
        font-family: "Poppins", sans-serif;
    }

    header {
        background-color: #fff;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-inline: 20px;
        box-shadow: 0px 10px 24px 6px rgba(0,0,0,0.1);
    }
    header a {
        display: flex;
        align-items: center;
    }

    header nav {
        display: flex;
        flex-direction: row;
        list-style: none;
    }

    header nav a {
        color: var(--roxo);
        text-decoration: none;
        padding: 5px 10px;
        font-weight: 400;
        transition: 0.3s;
    }
    header nav a:hover {
        text-decoration: underline;
        font-weight: 600;
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

    .nav {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 55px;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
        background-color: #ffffff;
        display: flex;
        overflow-x: auto;
    }

    .nav__link {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex-grow: 1;
        min-width: 50px;
        overflow: hidden;
        white-space: nowrap;
        font-family: sans-serif;
        font-size: 13px;
        color: #444444;
        text-decoration: none;
        -webkit-tap-highlight-color: transparent;
        transition: background-color 0.1s ease-in-out;
    }

    .nav__link:hover {
        background-color: #eeeeee;
    }

    .nav__link--active {
        color: var(--roxo);
    }

    .nav__icon {
        font-size: 18px;
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
</style>
<body>
    <header>
        <a href="principal.php"><img style="max-width: 100px;" src="../imgs/LogoRoxa.png" title="iRead"></a>
        <nav>
            <li><a href="/">Categorias</a></li>
            <li><a href="/">Sobre nós</a></li>
        </nav>
    </header>

    <div id="titulo">
        <h2>Bem vindo,<?php print_r($_SESSION['nome'])?></h2>
    </div>
    
    <div id="livros">
        <?php
            include_once('../php/config.php');
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
                $arquivo = "../livros/imagens/" . $row["capa"];
                $id = $row['idLivro'];
                $nome = $row['nome'];
                $autor = $row['autor'];
                $cat = $row['categoria'];


                echo "<div class=\"livro\">
                        <img class=\"capa\" src=\"$arquivo\"/>
                        <a href=\"exibirLivro.html?id=$id\">$nome</a>
                        <div class=\"area-textos\">
                            <p class=\"desc\">$autor</p>
                        </div>
                    </div>";
            }
        ?>
        

    </div>

    <nav class="nav">
        <a href="" class="nav__link nav__link--active">
            <i class="material-icons nav__icon">home</i>
            <span class="nav__text">Início</span>
        </a>
        <a href="busca.php" class="nav__link">
            <i class="material-icons nav__icon">search</i>
            <span class="nav__text">Pesquisar</span>
        </a>
        <a href="perfil.php" class="nav__link">
            <i class="material-icons nav__icon">account_circle</i>
            <span class="nav__text">Perfil</span>
        </a>
    </nav>

</body>
</html>