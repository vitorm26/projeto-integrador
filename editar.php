<?php  ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
<?php    
include_once 'topo.php';
$id = base64_decode($_GET["id"]);

$sql = "select * from cervejas where idproduto= ".$id;

include_once 'conexao.php';

$rs = mysqli_query($con,$sql);

if(mysqli_num_rows($rs)==1){
    $reg = mysqli_fetch_array($rs);
}

?>
<h3>Atualizar Cerveja</h3>
<form action="atualizar.php" class="form-control" method="post">
Nome: <br>
<input type="text" name="nome" class="form-control" id="nome" value="<?php echo $reg["nome"];?>">
<br>
Nota: <br>
<select name="nota" id="nota" class="form-control">
    <option value="<?php echo $reg["nota"];?>"><?php echo $reg["nota"];?></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
</select>
<br>
Pais: <br>
<select name="pais" id="pais" class="form-control">
    <option value="<?php echo $reg["nota"];?>"><?php echo $reg["pais"];?></option>
    <option value="holanda">Holanda</option>
    <option value="brasil">Brasil</option>
    <option value="alemanha">Alemanha</option>
    <option value="eua">EUA</option>
    <option value="outros">Outros</option>
</select>
<br>
Tipo: <br>
<select name="tipo" id="tipo" class="form-control">
    <option value="<?php echo $reg["tipo"];?>"><?php echo $reg["tipo"];?></option>
    <option value="Pilsen">Pilsen</option>
    <option value="American Lager">American Lager</option>
    <option value="Lager">Lager</option>
    <option value="American Premium Lager">American Premium Lager</option>
    <option value="German Lager">German Lager</option>
</select>
<br>
Comentário: <br>
<textarea name="comentario" id="comentario" class="form-control" value="<?php echo $reg["comentario"];?>"><?php echo $reg["comentario"];?></textarea>
<br>
Insira seu endereço:
<br>
<script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
  

   
    <!-- Inicio do formulario -->
      
        Cep:
        <input name="cep" type="text" id="cep" value="<?php echo $reg["cep"];?>" class="form-control" onblur="pesquisacep(this.value);"/><br/>
        Rua:
        <input name="rua" type="text" id="rua" value="<?php echo $reg["rua"];?>" class="form-control" /><br/>
        Bairro:
        <input name="bairro" type="text" id="bairro"  value="<?php echo $reg["bairro"];?>" class="form-control" /><br/>
        Cidade:
        <input name="cidade" type="text" id="cidade" value="<?php echo $reg["cidade"];?>" class="form-control" /><br/>
        Estado:
        <input name="uf" type="text" id="uf" value="<?php echo $reg["uf"];?>" class="form-control" /><br/>
        IBGE:
        <input name="ibge" type="text" id="ibge" value="<?php echo $reg["ibge"];?>" class="form-control" /><br/>
<input type="hidden" class="form-control" name="id" value="<?php echo $reg["idproduto"];?>"> 
<input class="btn btn-success" type="submit" value="Atualizar Cerveja">
<a href="tabela_adm.php" class="btn btn-danger" >Voltar</a>

</form>


<?php include_once 'rodape.php'; ?>
</div>