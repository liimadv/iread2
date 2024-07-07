<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Login - iRead</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    :root {
        --roxo: #4F30FF;
        --erro: #FF3200;
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
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0px 0px 50px 3px rgba(0,0,0,0.4);
        border-radius: 10px;
        margin-top: 10%;
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
        
        body{
            background-image: url('../imgs/fundo2.jpeg');
            background-repeat: no-repeat;
            background-size:100vh;
            
        }

        form {
            width: 250px;
            margin-top: 40%;
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
    <form action="verificarDados.php" method="post">
        <h2>Seja bem vind@!</h2>

        <div class="row">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="row">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" >
            <span id="msenha">Mostrar</span>
        </div>
        <div id="erro">
            <?php
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        </div>
        <button type="submit" name="submit">Entrar</button>
        <p id="sem-conta">Não possui cadastro? <br><a href="cadastro.php">Clique Aqui</a>!</p>
    </form>

    <script>
        var pass = document.querySelector('#senha');
        var span = document.querySelector('span');

        span.addEventListener('click', () => {
            if(pass.type === 'password') {
                pass.setAttribute('type', 'text');
                span.innerText = "Ocultar";
            }else {
                pass.setAttribute('type', 'password');
                span.innerText = "Mostrar";
            }
        })
    </script>
</body>
</html>