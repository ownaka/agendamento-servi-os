<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['cnpj']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('config.php');
        $cnpj = $_POST['cnpj'];
        $senha = $_POST['senha'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM instituicao WHERE cnpj = '$cnpj' and senha = '$senha'";

        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['cnpj']);
            unset($_SESSION['senha']);
            echo" errado";
        }
        else
        {
            $_SESSION['cnpj'] = $cnpj;
            $_SESSION['senha'] = $senha;
            header('Location: ../pages/dashboardInstituicao.html');
        }
    }
    else
    {
        // Não acessa
        header('Location: ../pages/logininstituicao.html');
    }
?>