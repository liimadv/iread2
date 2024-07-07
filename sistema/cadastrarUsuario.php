<?php
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

        include_once('../php/config.php');

        $nome = $_POST['nome']; 
        $dNasc = $_POST['data'];
        $genero = $_POST['genero'];
        $email = $_POST['email'];  
        $senha = $_POST['senha'];
        $senha2 = $_POST['senha2'];

        if($senha == $senha2) {
            $sqlEmail = "SELECT * FROM usuarios WHERE email = '$email'";
            $resultEmail = mysqli_query($conexao, $sqlEmail);
            if(mysqli_num_rows($resultEmail) > 0) {
                $_SESSION['msg'] = '<p id="p-erro">* E-mail está em uso.</p>';
                header("Location: cadastro.php");
            }else {
                $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, nasc, genero, email, senha) VALUES ('$nome', '$dNasc', '$genero', '$email', '$senha')");
                $_SESSION['msg'] = '<p id="p-sucesso">* Usuário Cadastrado!</p>';
                header("Location: login.php");
            }

        }else {
            $_SESSION['msg'] = '<p id="p-erro">* As senhas não coincidem.</p>';
            header("Location: cadastro.php");
        }

        
    }else {
        header("Location: cadastro.php");
    }
?>