<?php
if (isset($_POST['botao_enviar'])) {



    //---------------------------------------------------------------------------------------------
    // Extração das informações do formulário para variáveis.
    //---------------------------------------------------------------------------------------------
    
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    // extract($_POST); // Equivalente.

    //---------------------------------------------------------------------------------------------



    //---------------------------------------------------------------------------------------------
    // Configuração e conexão ao servidor e banco de dados.
    //---------------------------------------------------------------------------------------------

    $nomeDoServidor = "localhost";
    $nomeDoUsuario = "root";
    $senha = "";
    $nomeDoBancoDeDados = "sitec_2023";
    $conexao = new mysqli($nomeDoServidor, $nomeDoUsuario, $senha, $nomeDoBancoDeDados);
    if ($conexao->connect_error)
        die("Falha na conexão: " . $conexao->connect_error);

    //---------------------------------------------------------------------------------------------



    $sql_usuario = "INSERT INTO usuario
    (
        nome,
        login,
        senha
    ) VALUES
    (
        '$nome',
        '$login',
        'password_hash($senha, PASSWORD_DEFAULT)'
    )";


    //---------------------------------------------------------------------------------------------
    // Execução da solicitação SQL e exibição do resultado.
    //---------------------------------------------------------------------------------------------

    $solicitacaoSQLExecutadaComSucesso = $conexao->query($sql_usuario);
    if ($solicitacaoSQLExecutadaComSucesso == true) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro na inserção na tabela 'usuario': " . $conexao->error;
    }

    //---------------------------------------------------------------------------------------------



    $conexao->close();
}
