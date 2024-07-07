<?php
    session_start();
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Cadastro - iRead</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    :root {
        --roxo: #4F30FF;
        --erro: #FF3200;
        --sucesso: #78FF00;
    }

    ::selection {
        background-color: var(--roxo);
        color: #fff;
    }

    body{
        font-family: "Poppins", sans-serif;
        margin: 0;
        display: flex;
        justify-content: center;
        background-image: url('../imgs/fundo.jpeg');
        background-repeat: no-repeat;
        background-size:120vw;
        background-position:center;
    }

    form {
        background-color: #fafafa;
        width: 300px;
        padding: 20px 40px;
        margin-top: 5%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;

        box-shadow: 0px 0px 50px 3px rgba(0,0,0,0.4);
        border-radius: 10px;
    }

    h2 {
        text-align: center;
    }
    .row {
        width: 100%;
        position: relative;
        margin-bottom: 10px;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        justify-content: space-between;
    }

    input {
        padding: 8px 10px;
        border: 1px solid #777;
        border-radius: 5px;
        outline: 0;
    }
    #senha {
        padding-right: 80px;
    }

    select {
        padding: 8px 10px;
        border: 1px solid #777;
        border-radius: 5px;
        outline: 0;
    }
    .row span {
        position: absolute;
        top: 60%;
        right: 5px;
        transform: translateY(-20%);
        transition: 0.3s;
        border-left: 1px solid #777;
        padding-left: 5px;
        user-select: none;
        cursor: pointer;
        font-weight: 500;
    }

    button {
        width: 100%;
        outline: 0;
        border: 0;
        background-color: var(--roxo);
        padding-block: 10px;
        color: #fff;
        border-radius: 5px;
        font-weight: bolder;
    }

    #sem-conta {
        width: 100%;
        text-align: center;
    }

    #sem-conta a {
        text-decoration: none;
        color: var(--roxo);
    }

    #erro {
        width: 100%;
        text-align: center;
    }

    #erro #p-erro {
        margin: 0;
        color: var(--erro);
        font-weight: 600;
    }

    #erro #p-sucesso {
        margin: 0;
        color: var(--sucesso);
        font-weight: 600;
    }


    @media (max-width: 1024px) {
        
        body {
            background-image: url('../imgs/fundo2.jpeg');
            background-repeat: no-repeat;
            background-size:100vh;
            
        }

        form {
            width: 250px;
            margin-top: 20%;
        }

        #senha {
            padding-right: 60px;
            max-width: 100%;
        }

        span {
            scale: 0.8;
            right: 20px;
        }
    }
</style>

<body>
    <form action="cadastrarUsuario.php" method="post">
        <h2 style="width: 100%;">Seja bem vind@!</h2>

        <div class="row">
            <label for="nome">Seu nome</label>
            <input type="text" name="nome" id="nome" required>
        </div>
        <div class="row">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div style="max-width: 40%;" class="row">
            <label for="data">Nascimento</label>
            <input style="max-width: 100%;" type="date" name="data" id="data" required>
        </div>
        <div style="max-width: 40%;" class="row">
            <label for="genero">Gênero</label>
            <select style="max-width: 100%;" name="genero" id="genero" required>
                <option value="">Selecione</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
            </select>
        </div>

        <div class="row">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required >
        </div>
        <div class="row">
            <label for="senha2">Confirme a senha</label>
            <input type="password" name="senha2" id="senha2" required >
        </div>


        <div id="erro">
            <?php
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        </div>
        <button type="submit" name="submit">Cadastrar</button>
        <p id="sem-conta">Possui uma conta? <br><a href="login.php">Clique Aqui</a>!</p>
    </form>

</body>
</html>