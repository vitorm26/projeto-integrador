
<?php 
include_once 'topo.php';
$id = $_POST["id"];
$nome = $_POST["nome"];
$nota = $_POST["nota"];
$tipo = $_POST["tipo"];
$pais = $_POST["pais"];
$comentario = $_POST["comentario"];
$cep = $_POST["cep"];   
 $rua = $_POST["rua"];   
$bairro = $_POST["bairro"];   
$cidade = $_POST["cidade"];   
$uf = $_POST["uf"];   
 $ibge = $_POST["ibge"];  

include_once 'conexao.php';

$sql = "update cervejas set 
nome = '".$nome."',
nota = '".$nota."',
tipo = '".$tipo."',
pais = '".$pais."',
comentario = '".$comentario."',
cep = '".$cep."',
rua = '".$rua."',
bairro = '".$bairro."',
cidade = '".$cidade."',
uf = '".$uf."',
ibge = '".$ibge."'
where idproduto =".$id;


if(mysqli_query($con,$sql)){

    $msg = "Atualizado com Sucesso!";
}else{

    $msg = "Erro ao Atualizar!";
}

mysqli_close($con);
echo"<script>alert('".$msg."');
location.href='tabela_adm.php';


</script>";
include_once 'rodape.php';



?>