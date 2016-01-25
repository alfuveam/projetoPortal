<div class="container">
  <?php
  $cod_funcionario = "";
  $nome = "";
  $senha = "";
  $login = "";


  $funcionario = $this->getDados("funcionario");
  if ($funcionario) {
      $funcionario instanceof funcionario;
      $cod_funcionario = $funcionario->getCod_funcionario();
      $nome = $funcionario->getNome();
      $senha = $funcionario->getSenha();
      $login = $funcionario->getLogin();
  }
  ?>

  <form method="post" action="<?php echo URL; ?>controle-funcionario/salvar">
      <label>Codigo</label><br>
      <input type="text" readonly="true" value="<?php echo $cod_funcionario ?>" name="codigo"><br>

      <label>Nome</label><br>
      <input type="text" value="<?php echo $nome ?>" name="nome"><br>

      <label>Login</label><br>
      <input type="text" value="<?php echo $login ?>" name="login"><br>

      <label>Senha</label><br>
      <input type="password"  value="<?php echo $senha ?>" name="senha"><br>

      <input class="btn btn-primary" type="submit" value="Salvar">
      <a class="btn btn-primary" href="<?php echo URL; ?>controle-funcionario/lista-de-funcionario">Voltar</a><br>
  </form>
</div>
