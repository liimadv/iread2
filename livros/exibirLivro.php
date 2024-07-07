<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imgs/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../imgs/logo.png" type="image/x-icon">
    <title>Exibir Livro</title>
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

    header {
        background-color: var(--roxo);
        text-align: center;
        margin: 0;
        padding: 15px;
    }

    h4 {
        margin: 0;
        text-transform: uppercase;
        color: #fff;
    }

    #cabecalho {
        padding: 20px 30px;
        height: 20%;
        display: flex;
        background-color: #fbfbfb;
        border-bottom: 1px solid #909090;
    }

    #cabecalho img {
        border-radius: 10px;
        box-shadow: 0px 0px 29px -14px rgba(0,0,0,0.4);
    }

    #area-text {
        width: 40%;
        margin-left: 20px;
        padding: 10px;
    }

    h5 {
        font-size: 20px;
        margin: 0;
    }
    #area-text p {
        margin: 0;
    }

    #autor {
        padding-bottom: 20px;
        font-weight: 500;
        font-style: italic;
    }

    #desc {
        padding-bottom: 40px;
    }

    #area-coment {
        background-color: #fbfbfb;
        border-bottom: 1px solid #909090;
        padding: 10px 20px;  
        display: flex;
        justify-content: space-between; 
    }

    #area-coment input {
        width: 90%;
        padding: 10px;
        border: none;
        outline: 0;
        background-color: #ebebeb;
        border-radius: 10px 0px 0px 10px;
        color:#000;
        font-weight: 500;
    }

    #area-coment button {
        width: 10%;
        border: none;
        outline: 0;
        background-color: var(--roxo);
        color: #fff;
        border-radius: 0px 10px 10px 0px;
        font-weight: 500;
    }

    #comentarios {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    #menu {
        display: none;
    }
    @media (max-width: 576px) {
        #cabecalho {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        #cabecalho img {
            max-width: 50%;
        }
        #cabecalho #area-text {
            margin: 0;
            width: 100%;
        }
        
        #area-coment {
            flex-direction: column;
            align-items: center;
        }
        #area-coment input {
            border-radius: 10px;
            width: 95%;
            margin-bottom: 5px;
        }
        #area-coment button {
            border-radius: 10px;
            width: 100%;
            padding: 10px;
        }
    }
</style>
<body>
    
    <?php
        include_once("../php/config.php");
        $idLivro = $_GET['id'];

        $sql = "SELECT * FROM livro WHERE idLivro = '$idLivro'"; 
        $result = mysqli_query($conexao, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $arquivo = "imagens/" . $row["capa"];
            $id = $row['idLivro'];
            $nome = $row['nome'];
            $autor = $row['autor'];
            $cat = $row['categoria'];

            echo "  <header>
                        <h4>$nome</h4>
                    </header>
                    <div id=\"cabecalho\">
                        <img src=\"$arquivo\" title=\"$nome\">
                        <div id=\"area-text\">
                        <h5>$nome</h5>
                        <p id=\"autor\">$autor</p>
                        <p id=\"desc\">Ainda vou fazer a descrição</p>
                        </div>
                    </div>   

                    <div id=\"area-coment\">
                        <input type=\"text\" name=\"comentario\" id=\"comentario\" placeholder=\"Faça um comentário...\">
                        <button type=\"submit\" onclick=\"alertar()\">Comentar</button>
                    </div>
                <div id=\"comentarios\">
                    Este livro ainda não possui avaliações.    
                </div>";

            echo "<script>document.title = \"$nome\";</script>";
        }else {
            echo "  <header>
                        <h4>Ocorreu um erro</h4>
                    </header>
                    <div id=\"comentarios\">
                        Este livro não existe.    
                    </div>";

            echo "<script>document.title = \":(\";</script>";
        }
    ?>

</body>
</html>