<div class="container">
  <?php
  $cod_aluno = "";
  $cpf = "";
  $rg = "";
  $data_nascimento = "";
  $nome = "";
  $telefone = "";


  $aluno = $this->getDados("aluno");
  if ($aluno) {
      $aluno instanceof aluno;
        $cod_aluno = $aluno->getCod_aluno();
        $cpf = $aluno->getCpf();
        $rg = $aluno->getRg();
        $data_nascimento = $aluno->getData_nascimento();
        $nome = $aluno->getNome();
        $telefone = $aluno->getTelefone();
  }
  ?>

  <form  method="post" action="<?php echo URL; ?>controle-aluno/salvar">
      <label>Codigo</label><br>
      <input type="text" readonly="true" value="<?php echo $cod_aluno ?>" name="codigo"><br>

      <label>Cpf</label><br>
      <input type="text" value="<?php echo $cpf ?>" name="cpf"><br>

      <label>Rg</label><br>
      <input type="text" value="<?php echo $rg ?>" name="rg"><br>

      <label>Data Nascimento</label><br>
      <input type="text" value="<?php echo $data_nascimento ?>" name="data_nascimento"><br>

      <label>Nome</label><br>
      <input type="text" value="<?php echo $nome ?>" name="nome"><br>

      <label>Telefone</label><br>
      <input type="text" value="<?php echo $telefone ?>" name="telefone"><br>

      <input class="btn btn-primary" type="submit" value="Salvar">
      <a class="btn btn-primary" href="<?php echo URL; ?>pagina-inicial">Voltar</a><br>
      </div>
  </form>
</div>
