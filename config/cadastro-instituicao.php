<?php
if(isset($_POST['submit']))
{
    include_once('config.php');

    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $confirmar_senha = $_POST['confirme_senha'];
    
    

    $erro = '';

    // Verifique se algum dos campos está vazio
    if(empty($nome) || empty($cnpj) || empty($email) || empty($senha) || empty($telefone)) {
        $erro .= "<div>Por favor, preencha todos os campos.</div>";
    } 

    // Adicione suas validações aqui. Por exemplo:
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro .= "<div>Formato de e-mail inválido.</div>";
    }

    if (empty($nome)) {
        $erro .= "<div>O nome é obrigatório.</div>";
    } else if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
        $erro .= "<div>Apenas letras e espaços em branco são permitidos no campo nome.</div>";
    } else if (strlen($nome) < 2) {
        $erro .= "<div>O nome deve ter pelo menos 2 caracteres.</div>";
    } else if (strlen($nome) > 50) {
        $erro .= "<div>O nome deve ter no máximo 50 caracteres.</div>";
    }

    else if (!is_numeric($telefone)) {
        $erro .= "<div>Apenas números são permitidos no telefone.</div>";
    }

    if (strlen($senha) < 8) {
        $erro .= "<div>A senha deve ter pelo menos 8 caracteres.</div>";
    } else if (!preg_match("#[0-9]+#", $senha)) {
        $erro .= "<div>A senha deve conter pelo menos um número.</div>";
    } else if (!preg_match("#[a-zA-Z]+#", $senha)) {
        $erro .= "<div>A senha deve conter pelo menos uma letra.</div>";
    } else if (!preg_match("#[A-Z]+#", $senha)) {
        $erro .= "<div>A senha deve conter pelo menos uma letra maiúscula.</div>";
    } else if (!preg_match("#[a-z]+#", $senha)) {
        $erro .= "<div>A senha deve conter pelo menos uma letra minúscula.</div>";
    } else if (!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $senha)) {
        $erro .= "<div>A senha deve conter pelo menos um caractere especial.</div>";
    } else if ($senha != $confirmar_senha) {
        $erro .= "<div>As senhas não correspondem.</div>";
    } else {
        
    }

    
    function validaCNPJ($cnpj) {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
        if (strlen($cnpj) != 14 || preg_match("/^{$cnpj[0]}{14}$/", $cnpj)) {
            return false;
        }
        for ($t = 12; $t < 14; $t++) {
            for ($d = 0, $p = $t; $p > 1; $p--, $d += $cnpj[$t - $p] * $p);
            for ($p = 9, $d += $cnpj[$t - $p] * $p; $p > 1; $p--, $d += $cnpj[$t - $p] * $p);
            if ($cnpj[$t] != ($d = ((10 * $d) % 11) % 10)) return false;
        }
        return true;
    }
    
    


    if(empty($erro)) {
        
        $stmt = $conexao->prepare("INSERT INTO instituicao(cnpj,nome,email,telefone,senha) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $cnpj, $nome, $email, $telefone, $senha);
        $stmt->execute();
        header('Location: ../pages/loginInstituicao.html');
    } else {
        echo $erro;
    }
}
?>