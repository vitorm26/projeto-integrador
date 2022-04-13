<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php    
    include_once 'topo.php';
    session_start();
    include_once 'verificacao.php';
    
    
    
    // abrir a conexão com o banco
    
    ?>
    <div class="container">
<h3>Painel do Cervejeiro 🍻🍻</h3>
    <hr>
    <?php 
        echo "Seja Bem Vindo(a), ".$_SESSION["nome"];
        echo "<h4>Menu</h4>";

        if($_SESSION["perfil"] == "adm"){
            include_once 'menu_adm.php';

        }else{
            include_once 'menu_user.php';
        } 
        

            
     include_once 'rodape.php'; ?>
     </div>