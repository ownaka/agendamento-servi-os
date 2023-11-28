<?php

    if(isset($_POST['submit']))
    {
       

        include_once('config.php');
        
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        
        $result = mysqli_query($conexao, "INSERT INTO voluntario(cpf,email,telefone,senha) 
        VALUES ('$cpf','$email','$telefone','$senha')");

        
    }
    
    

?>
