<?php
    session_start();
    if($_SESSION['admin'] != 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../sistema/desconectar.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo.png" type="image/x-icon">
    <title>Cadastrar Livros</title>
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

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 300px;
        padding: 30px 20px;
        border: 1px solid #777;
        border-radius: 10px;
        box-shadow: 0px 10px 24px 6px rgba(0,0,0,0.1);
    }

    input {
        padding: 5px 10px;
        margin-bottom: 15px;
        border: 1px solid #777;
        border-radius: 5px;
        outline: 0;
        transition: 0.3s;
    }
    input:focus {
        border-color: var(--roxo);
    }

    select {
        padding: 5px 10px;
        margin-bottom: 15px;
        border: 1px solid #777;
        border-radius: 5px;
        outline: 0;
    }

    button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        outline: 0;
        background-color: var(--roxo);
        color: #fff;
        font-weight: 700;
        transition: 0.3s;
    }

    button:hover {
        
        box-shadow: 0px 10px 24px 6px rgba(0,0,0,0.2);
    }
</style>
<body>
    <h1>Cadastrar novo Livro</h1>

    <!-- nome, autor, categoria, imagem -->
    <form enctype="multipart/form-data" action="cadastrolivro.php" method="post">
        <label for="nome">Nome do Livro</label>
        <input type="text" name="nome" id="nome" required>
        <label for="autor">Autor do Livro</label>
        <input type="text" name="autor" id="autor" required">
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria" required>
            <option value=""> - </option>
            <option value="Ação">Ação</option>
            <option value="Drama">Drama</option>
            <option value="Romance">Romance</option>
            <option value="Terror">Terror</option>
        </select>
        <label for="arquivo">Capa do Livro</label>
        <input type="file" name="arquivo" id="arquivo" required>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>