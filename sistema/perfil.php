<?php
    session_start();
    if((!isset($_SESSION['email']) == true) || (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Perfil - iRead</title>
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
    }

    h2 {
        text-align: center;
    }

    header {
        background-color: #fff;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-inline: 20px;
        box-shadow: 0px 10px 24px 6px rgba(0,0,0,0.1);
    }

    main {
        padding: 20px;
        margin-top: 10px;
        margin-bottom: 10%;
        display: flex;
        justify-content: center;
    }

    .area-perfil {
        width: 90%;
        display: flex;
        flex-direction: row;
        border: 1px solid #777;
        border-radius: 10px;
    }

    .links {
        width: 25%;
        padding: 10px;
        border-right: 1px solid #777;
    }

    .linkitem {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #777;
    }

    .linkitem i {
        padding-right: 10px;
    }

    .linkitem  {
        text-decoration: none;
        color: black;
    }

    .linkitem:hover {
        font-weight: 600;
    }

    .linkitem.ativo {
        font-weight: 600;
        color: var(--roxo);
    }
    .linkitem.ativo a {
        color: var(--roxo);
    }


    .conteudo {
        width: 75%;
        margin-bottom: 10px;
        padding: 10px 20px;
        display: flex;
        flex-direction: column;
    }

    .area-text {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    .menu.oculto {
        display: none;
    }
    .menu.ativo {
        display: block;
    }

    input {
        width: 70%;
        padding: 8px 10px;
        border: 1px solid #777;
        border-radius: 5px;
        outline: 0;
    }

    #verify-email {
        width: 70%;
        background-color: rgb(255, 255, 148);

        padding: 8px 10px;
        border: 1px solid rgb(240, 240, 80);
        border-radius: 5px;
        margin-block: 5px;
    }

    #verify-email p {
        margin: 0
    }

    .menu button {
        outline: none;
        border: none;
        padding: 10px 30px;
        color: #fff;
        font-weight: 500;
        border: 2px solid #1e02c0;
        border-radius: 5px;
        background-color: var(--roxo);
    }

    .sair,
    .sair a {
        color: #fc3b00;
    }


    @media (max-width: 1024px) {
        .area-perfil {
            flex-direction: column;
            align-items: center;
        }

        .links {
            width: 90%;
            padding: 0;
            border-right: none;
            padding-inline: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #777;
        }

        .conteudo {
            width: 90%;
        }

        input {
            width: 90%;
        }

        #verify-email {
            width: 90%;
        }
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

    .navlink {
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

    .navlink:hover {
        background-color: #eeeeee;
    }

    .nav__link--active {
        color: var(--roxo);
    }

    .nav__icon {
        font-size: 18px;
    }
</style>
<body>
    <header>
        <a href="principal.php"><img style="max-width: 100px;" src="../imgs/LogoRoxa.png" title="iRead"></a>
    </header>

    <h2>Olá, <?php echo $_SESSION['nome']?>!</h2>
    <main>
        

        <div class="area-perfil">
            
            <div class="links">

                <a href="#conta" class="linkitem ativo">
                    <i class="material-icons nav__icon">manage_accounts</i>
                    <span>Conta</span>
                </a>
                <a href="#senha" class="linkitem ">
                    <i class="material-icons nav__icon">password</i>
                    <span>Recuperar Senha</span>
                </a>
                <a href="#config" class="linkitem ">
                    <i class="material-icons nav__icon">settings</i>
                    <span>Configs</span>
                </a>
                <?php
                    if($_SESSION['admin'] == 1) { ?>
                        <a href="../livros/cadastrarLivro.php" class="linkitem ">
                            <i class="material-icons nav__icon">add_circle_outline</i>
                            <span>Cadastrar Livro</span>
                        </a>
            <?php   }
                ?>

            </div> 
            <div class="conteudo">
                <div class="menu" id="conta">
                    <div class="area-text">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" disabled> 
                    </div>
                    
                    <div class="area-text">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" disabled>
                        <div id="verify-email">
                            <p>Seu e-email ainda não foi verificado.</p>
                        </div>   
                    </div>

                    <script>
                        document.getElementById('nome').value = '<?php echo $_SESSION['nome']; ?>';
                        document.getElementById('email').value = '<?php echo $_SESSION['email']; ?>';
                    </script>
                </div>

                <div class="menu oculto" id="senha">
                    <div class="area-text">
                        <label for="senha_antiga">Sua senha atual</label>
                        <input type="text" name="senha_antiga" id="senha_antiga" disabled> 
                    </div>

                    <div class="area-text">
                        <label for="senha_nova">Sua nova senha</label>
                        <input type="text" name="senha_nova" id="senha_nova" disabled> 
                    </div>
                    <div class="area-text">
                        <label for="senha_nova2">Confirme a senha</label>
                        <input type="text" name="senha_nova2" id="senha_nova2" disabled> 
                    </div>
                    <button type="submit" name="submit">Alterar</button>
                </div>

                <div class="menu oculto" id="config">
                    <a href="desconectar.php" class="linkitem sair">
                        <i class="material-icons nav__icon">logout</i>
                        <span>Desconectar</span>
                    </a>
                </div>
            </div>
        </div>
    
    
        
    </main>



    <nav class="nav">
        <a href="inicio.php" class="navlink">
            <i class="material-icons nav__icon">home</i>
            <span class="nav__text">Início</span>
        </a>
        <a href="busca.php" class="navlink">
            <i class="material-icons nav__icon">search</i>
            <span class="nav__text">Pesquisar</span>
        </a>
        <a href="" class="navlink nav__link--active">
            <i class="material-icons nav__icon">account_circle</i>
            <span class="nav__text">Perfil</span>
        </a>
    </nav>

    <script>
        const item = document.querySelectorAll('.linkitem');
        const menu = document.querySelectorAll('.menu');

        function select() {
            item.forEach((item)=> 
                item.classList.remove('ativo')
            )
            this.classList.add('ativo');

            menu.forEach((mn)=>
                mn.classList.add('oculto')
            )
            var href = this.getAttribute('href');
            var menu1 = document.querySelector(href);

            menu1.classList.remove('oculto');

        }

        item.forEach((item)=> {
            item.addEventListener('click', select);
        })
    </script>
</body>
</html>