<?php 

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
            
    $sql ="insert into cervejas values
    (null,'".$nome."','".$nota."','".$tipo."','".$pais."','".$comentario."','".$cep."','".$rua."','".$bairro."','".$cidade."','".$uf."','".$ibge."')";

    $result = mysqli_query($con,$sql);

    if($result){

        $msg = "Gravado com sucesso!";
    }else{

        $msg = "Erro ao Gravar!";
    }

    mysqli_close($con);
    echo"<script>alert('".$msg."');
    location.href='cadastrocerveja.php';
    
    
    </script>";
    include_once 'rodape.php';

    ?>