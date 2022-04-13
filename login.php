<?php
session_start();
// resgatar os dados da tela

$nome = $_POST["nome"];
$password = md5($_POST["password"]);


// abrir a conexão com o banco

include_once 'conexao.php';

// montar a instrução para ir ao banco 

$sql = "select * from usuario where nome = '".$nome."' and senha = '".$password."'";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_array($result);
    
    $_SESSION["nome"] = $row["nome"];
    $_SESSION["perfil"] = $row["perfil"];
    $_SESSION["tempo"] = time(); // guardar o momento exato do login
    $_SESSION["verificacao"] = true;
    header("location:painel.php");
    
}else{
    $msg = "Login ou senha inválidos";
    echo "<script>location.href='index.php';</script>";
}



?>
