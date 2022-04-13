<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="signin.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/cervejaestupidamentegelada.jfif" sizes="32x32" type="image/png">
    <title>Área do Cervejeiro 🍻🍻</title>
    <style>
    body{
        margin:auto;
        display:table;
        background:Silver;
    }
    #container{
        margin:auto;
        width:960px;
        float:left;
    }
    #topo{
        width:960px;
        float:left;
        height:20px;
        padding:10px;

    }
    #menu{
        width:960px;
        float:left;
        margin-top:10px;
        margin-bottom:10px;
    }
    #menu a{
        display:inline;
        text-decoration:none;
        padding:10px;
        color:DarkSlateGray;
    }
    #menu a:hover{
        background:CadetBlue;
        text-decoration:underline;
    }
</style> 
</head>
<body class="text-center">
    <br><br><br>
    <h3>Área Do Cervejeiro 🍻🍻 </h3>
    <form action="login.php" method="post">
        Login:</br>
        <input type="text" name="nome"/></br>
        Senha:</br>
        <input type="password" name="password"/></br>
        <br>
        <input type="submit" value="Login"/>
        <a href="cadastro_user.php"><input type="button" value="Cadastro"/></a>
        </form>
        <?php
        if(isset($_GET["msg"])){
            echo $_GET["msg"];
        }
?>

</body>
<?php
include_once 'rodape.php';
?>
  