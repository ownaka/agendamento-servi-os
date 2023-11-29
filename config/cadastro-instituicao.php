<?php
$erro = '';
if(isset($_POST['submit']))
{
    include_once('config.php');

    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

    // Verifique se algum dos campos está vazio
    if(empty($nome) || empty($cnpj) || empty($email) || empty($senha) || empty($telefone)) {
        $erro = "Por favor, preencha todos os campos.";
        
    } 
    // Adicione suas validações aqui. Por exemplo:
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Formato de e-mail inválido.";
        
    }
    else if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
        $erro = "Apenas letras e espaços em branco permitidos no nome.";
        
    }
    else if (!is_numeric($telefone)) {
        $erro = "Apenas números são permitidos no telefone.";
        
    }
    else {
        $result = mysqli_query($conexao, "INSERT INTO instituicao(nome,cnpj,email,telefone,senha) 
        VALUES ('$cnpj','$email','$telefone','$senha','$nome')");
        header('Location: ../pages/loginInstituicao.html');

    }
}
?>

<!-- Seu formulário HTML aqui -->

