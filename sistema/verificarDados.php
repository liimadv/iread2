<?php
    session_start();
    //print_r($_REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        include_once('../php/config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($conexao, $sql);
        

        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) < 1) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            $_SESSION['msg'] = '<p id="p-erro">* Usuário não encontrado!</p>';
            header('Location: login.php');
        }else {

            if($row['senha'] == $senha) {
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['admin'] = $row['admin'];
                header('Location: inicio.php');
            }else {
                $_SESSION['msg'] = '<p id="p-erro">* Senha incorreta!</p>';
                header('Location: login.php');
            }
            
        }
    }else {
        header('Location: login.php');
    }
?>