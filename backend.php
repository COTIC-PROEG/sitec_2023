<?php

Class Backend {
    public function conectar() {
        // Configuração e conexão ao servidor e banco de dados.

        $nomeDoServidor = "localhost";
        $nomeDoUsuario = "root";
        $senha = "";
        $nomeDoBancoDeDados = "sitec_2023";
        $conexao = new mysqli($nomeDoServidor, $nomeDoUsuario, $senha, $nomeDoBancoDeDados);
        if ($conexao->connect_error)
            die("Falha na conexão: " . $conexao->connect_error);
        else
            return $conexao;
    }

    public function salvar() {
        // Persistência dos dados do formulário no banco de dados.

        if (isset($_POST['botao_enviar'])) {
            $conexao = $this->conectar();
        
            
            
            // Extração das informações do formulário para variáveis.
            
            extract($_POST);
            // $nome = $_POST['nome']; //Equivalentes.
            // $login = $_POST['login'];
            // $senha = $_POST['senha'];
        

        
            // Definição e execução da solicitação SQL (Tabela Usuario).
        
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $sql_usuario = "INSERT INTO usuario (
                login,
                senha
            ) VALUES (
                '$login',
                '$senha_hash'
            )";
            $solicitacaoSqlUsuarioExecutadaComSucesso = $conexao->query($sql_usuario);
            
        
        
            // Definição e execução da solicitação SQL (Tabela Pessoa).
        
            $idUsuario = $conexao->insert_id;
            $sql_pessoa = "INSERT INTO pessoa (
                idUsuario,
                nome,
                email,
                fone,
                sexo,
                dataNascimento,
                estado,
                semestre,
                descricao
            ) VALUES (
                '$idUsuario',
                '$nome',
                '$email',
                '$fone',
                '$sexo',
                '$dataNascimento',
                '$estado',
                '$semestre',
                '$descricao'
            )";
            $solicitacaoSqlPessoaExecutadaComSucesso = $conexao->query($sql_pessoa);
        
        
        
            // Exibição do resultado das solicitações e redirecionamento para consulta.
            
            if (($solicitacaoSqlUsuarioExecutadaComSucesso && $solicitacaoSqlPessoaExecutadaComSucesso) == true) {
                echo "Cadastro realizado com sucesso!";
                echo "<script>location.href='consulta.php';</script>";
                exit();
            } else
                echo "Erro na inserção dos dados': " . $conexao->error;
            
        

            $conexao->close();
        }
    }

    public function buscar() {
        $conexao = $this->conectar();

        $sql_pessoa = "SELECT * FROM pessoa WHERE idUsuario = '$idUsuario'";
    }
}
