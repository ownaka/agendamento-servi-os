<?php
if(isset($_POST['submit']))
{
    include_once('config.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $confirmar_senha = $_POST['confirmar_senha'];
    
    

    $erro = '';

    // Verifique se algum dos campos está vazio
    if(empty($nome) || empty($cpf) || empty($email) || empty($senha) || empty($telefone)) {
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

    
        if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {
            return false;
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
    
    }
        $stmt = $conexao->prepare("SELECT * FROM voluntario WHERE cpf = ?");
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $erro .= "<div>CPF já cadastrado.</div>";
        }


    if(empty($erro)) {
        
        $stmt = $conexao->prepare("INSERT INTO voluntario(cpf,nome,email,telefone,senha) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $cpf, $nome, $email, $telefone, $senha);
        $stmt->execute();
        header('Location: ../pages/loginVoluntario.html');
    } else {
        echo $erro;
    }

    
?>