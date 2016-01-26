<div class="container">
  <?php
  $cod_curso = "";
  $nome = "";
  $valor_inscricao = "";
  $periodo = "";

  $curso = $this->getDados("curso");
  if ($curso) {
        $curso instanceof curso;
        $cod_curso = $curso->getCod_curso();
        $nome = $curso->getNome();
        $valor_inscricao = $curso->getValor_incricao();
        $periodo = $curso->getPeriodo();
  }
  ?>

  <form  method="post" action="<?php echo URL; ?>controle-curso/salvar">
      <label>Codigo</label><br>
      <input type="text" readonly="true" value="<?php echo $cod_curso ?>" name="codigo"><br>

      <label>Nome</label><br>
      <input type="text" value="<?php echo $nome ?>" name="nome"><br>

      <label>Valor Inscricao</label><br>
      <input type="text" value="<?php echo $valor_inscricao ?>" name="valor_inscricao"><br>

      <select name="periodo">
          <option value="1"<?php
            if($periodo == '1'){
              echo 'selected "true"';
            }?>>Matutino</option>>

          <option value="2"<?php
            if($periodo == '2'){
              echo 'selected "true"';
            }?>>Vespertino</option>>

            <option value="3"<?php
              if($periodo == '3'){
                echo 'selected "true"';
              }?>>Integral</option>>
            </select>

      <input class="btn btn-primary" type="submit" value="Salvar">
      <a class="btn btn-primary" href="<?php echo URL; ?>pagina-inicial">Voltar</a><br>
  </form>
</div>
