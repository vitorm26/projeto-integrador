<?php
// BUSCAR O ID PELA URL
//$id = base64_decode($_GET["id"]);
$id =$_GET["id"];
//echo"id do produto é: ".$id;

// MONTAR A INSTRUÇÃO DE APAGAR NO BANCO DE DADOS

$sql = "delete from cervejas where idproduto =".$id;

//chamar a conexão
include_once 'topo.php';
include_once 'conexao.php';

if(mysqli_query($con,$sql)){

    $msg = "Produto Excluido com sucesso!";
}else{
    //echo"Erro ao Excluir :(";
    $msg = "Erro ao Excluir!";
}
mysqli_close($con);
echo"<script>alert('".$msg."');
location.href='tabela_adm.php';


</script>";

include_once 'rodape.php';
?>