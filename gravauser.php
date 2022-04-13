<?php 

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password1 = $_POST["confirm_password"];
            $perfil = $_POST["perfil"];
            $cep = $_POST["cep"];   
            $rua = $_POST["rua"];   
            $bairro = $_POST["bairro"];   
            $cidade = $_POST["cidade"];   
            $uf = $_POST["uf"];   
            $ibge = $_POST["ibge"];   
               
            if($nome!="" && $password==$password1){

            include_once 'conexao.php';
            
    $sql ="insert into usuario values
    (null,'".$nome."','".$email."','".md5($password)."','".$perfil."','".$cep."','".$rua."','".$bairro."','".$cidade."','".$uf."','".$ibge."')";

    $result = mysqli_query($con,$sql);

    if($result){

        $msg = "Gravado com sucesso!";
    }else{

        $msg = "Erro ao Gravar!";
    }

    mysqli_close($con);
    echo"<script>alert('".$msg."');
    location.href='cadastro_user.php';
    
    
    </script>";
}else{
    echo"<script>alert('ERRO! :(');
    location.href='cadastro_user.php';</script>";
}
    include_once 'rodape.php';

    ?>