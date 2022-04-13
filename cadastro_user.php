<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php include_once 'conexao.php';
include_once 'topo.php'; ?>
<div class="container">
    <br>
<h3>Novo Usuário</h3>
<form action="gravauser.php" class="form-control" method="post">
Nome de Usuário: <br>
<input type="text" name="nome" class="form-control" id="nome" required>
<br>
E-mail: <br>
<input type="email" name="email" class="form-control" id="nome" required>
<br>
Senha : <br>
  <input name="password" class="form-control"id="password" type="password" onkeyup='check();' />
<br>
Repita Senha: <br>

  <input type="password" class="form-control" name="confirm_password" id="confirm_password" onkeyup='check();' />
  <span id='message'></span>

<br>
Perfil:
<br>
    <select name="perfil" id="perfil" class="form-control">
        <option value="">Selecione</option>
        <option value="adm">AdímínistraidoR</option>
        <option value="user">Usuário</option>
</select>
<br>
Endereço:
<br>
Cep:
       <br>
       <input name="cep" class="form-control" type="number" id="cep" value=""
              onblur="pesquisacep(this.value);" /><br/>
       Rua: <br>
       <input name="rua" class="form-control" type="text" id="rua" /><br/>
       Bairro: <br>
       <input name="bairro" class="form-control" type="text" id="bairro" /><br/>
       Cidade: <br>
       <input name="cidade" class="form-control" type="text" id="cidade" /><br/>
       Estado: <br>
       <input name="uf" class="form-control" type="text" id="uf" /><br/>
        IBGE: <br>
       <input name="ibge" class="form-control"type="text" id="ibge" /><br/>
 
   <br>

<br>
<input class="btn btn-success" type="submit" value="Cadastrar Usuário">
<input class="btn btn-danger" type="reset" value="Limpar">
<a href="index.php"><input class="btn btn-warning" type="button" value="Login"/></a>


</form>

<?php include_once 'rodape.php'?>
<script>
    var check = function () {
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Senhas Iguais';
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Senhas Diferentes';
      }
    }
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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