<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<?php 
include_once 'topo.php';
?>
<div class="container">
   <?php echo"<h1>Tabela de Cervejas do ADM</h1>";
 
     include_once 'conexao.php';

    $sql = "select * from cervejas ORDER BY nome ASC";

    $rs = mysqli_query($con,$sql);

    if(mysqli_num_rows($rs)>0){


?>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value)> -1)
    });
  });
});</script>
Pesquise uma cerveja:</p>  
<input id="myInput" type="text" placeholder="Search..">
<br>
<br>
        <table class="table table-bordered border-primary" border="15px">
        <tr>
            <th>Nome</th>
            <th>Nota</th>
            <th>Tipo</th>
            <th>Pais</th>
            <th>Comentário</th>
            <th>CEP</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>IBGE</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>

<?php
while($linha = mysqli_fetch_array($rs)){
            ?>
            <tbody id="myTable">
            <tr>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["nota"]; ?></td>
                <td><?php echo $linha["tipo"]; ?></td>
                <td><?php echo $linha["pais"]; ?></td>
                <td><?php echo $linha["comentario"]; ?></td>
                <td><?php echo $linha["cep"]; ?></td>
                <td><?php echo $linha["rua"]; ?></td>
                <td><?php echo $linha["bairro"]; ?></td>
                <td><?php echo $linha["cidade"]; ?></td>
                <td><?php echo $linha["uf"]; ?></td>
                <td><?php echo $linha["ibge"]; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo base64_encode($linha["idproduto"]); ?>" class="btn btn-info">Editar
                    </a>
                </td>

                <td>
                <a href="#" onclick="excluir(<?php echo($linha["idproduto"]); ?>)"class="btn btn-warning" >Excluir
                    </a>
                </td>            </tr>
                <?php
        }?>
        <tr>
          <td><a class="btn btn-success"  href="painel.php">Voltar para o painel</a> </td>
        </tr>
        
        </table>
        <?php

    }else{
        echo"<br><h1>Não existem Cervejas cadastradas</h1>";
    }

    mysqli_close($con);
    include_once 'rodape.php';
    ?>
</div>
<script> 
function excluir(id){
     if(confirm('Deseja realmente excluir o produto?' )){;
     location.href='excluir.php?id='+id;
}}
</script>

