<div class="container">

  <form action="<?php echo URL;?>login/confirmar-autenticacao" method="post" class="form-signin">
      <h2 class="form-signin-heading"> Informe o Login e a Senha</h2>
      <label class="sr-only"> Login </label>
      <input class="form-control" placeholder="Login" type="text" name="login">

      <label class="sr-only"> Senha </label>
      <input class="form-control" placeholder="Password" type="password" name="senha">

      <input class="btn btn-lg btn-primary btn-block"type="submit" value="entrar">
  </form>

</div>
