<?php
    if(isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];
        if($arquivo['error']) {
            die('Falha ao enviar arquivo');
        }

        if($arquivo['size'] > 2097152) 
            die('Arquivos devem ter no máximo 2MB.');

        $pasta = "imagens/";
        $idArquivo = uniqid();
        $extensao = strtolower("." . pathinfo($arquivo['name'], PATHINFO_EXTENSION));

        if($extensao != ".jpg" && $extensao != ".png")
            die("Arquivo não aceito. Apenas jpg ou png.");

        $funcionou = move_uploaded_file($arquivo['tmp_name'], $pasta . $idArquivo . $extensao);

        if($funcionou)
            echo "<script>alert('Upload concluido');</script>";
        else
            echo "<script>alert('Erro');</script>";

        $novoArquivo = $idArquivo . $extensao;
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $cate = $_POST['categoria'];

        include_once('../php/config.php');

        $cadastro = mysqli_query($conexao, "INSERT INTO livro(idLivro, nome, autor, categoria, capa) VALUES ('$idArquivo', '$nome', '$autor', '$cate', '$novoArquivo')");
        
        if($cadastro) {
            echo "<script>alert('Livro Cadastrado.');";   
        }else {
            echo "<script>alert('Livro não Cadastrado.');";
        }
        
        header("Location: cadastrarLivro.php");
    }
?>