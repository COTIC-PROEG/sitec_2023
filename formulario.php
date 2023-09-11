<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="http://fonts.cdnfonts.com/css/straightler" rel="stylesheet">
    <title>Formulário</title>
</head>

<body>
    <div class="area-cabecalho">
        <div id="area-logo">
            <h1><span class="roxo">SITEC </span><span class="ano">2023</span></h1>
        </div>      
        <div id="area-menu">
            <a href="index.php">Início</a> 
            <a href="formulario.php">Formulário</a> 
            <a href="consulta.php">Consulta</a>  
        </div>       
    </div>

    <div class="content">
        <form action="salvaFormulario.php" id="form">
            <h2 class="text">FORMULÁRIO DE CADASTRO</h2>

            <div>
                <input type="text" placeholder="Nome..." class="inputs required">
                <span class="span-required">Praesent egestas Praesent egestas</span>
            </div>

            <div>
                <input type="text" name="login" id="login" placeholder="Login..." class="inputs required">
                <span class="span-required">Praesent egestas Praesent egestas</span>
            </div>

            <div>
                <input type="password" name="senha" id="senha" placeholder="Senha..." class="inputs required">
                <span class="span-required">Praesent egestas Praesent egestas</span>
            </div>
            
            <button class="botao_enviar" type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>