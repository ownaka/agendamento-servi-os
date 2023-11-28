<?php

    if(isset($_POST['submit']))
    {
       

        include_once('config.php');
        
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        
        $result = mysqli_query($conexao, "INSERT INTO instituicao(cnpj,email,telefone,senha) 
        VALUES ('$cnpj','$email','$telefone','$senha')");

        
    }
    
    

?>
