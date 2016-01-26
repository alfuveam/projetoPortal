<div class="container">
  <?php
  $cod_matricula = "";
  $cod_aluno = "";
  $cod_curso = "";
  $data_matricula = "";
  $ano = "";
  $ativo = "";
  $pago = "";

  $matricula = $this->getDados("matricula");
  if ($matricula) {
        $matricula instanceof matricula;
        $cod_matricula = $matricula->getCod_matricula();
        $cod_aluno = $matricula->getCod_aluno();
        $cod_curso = $matricula->getCod_curso();
        $data_matricula = $matricula->getData_matricula();
        $ano = $matricula->getAno();
        $ativo = $matricula->getAtivo();
        $pago = $matricula->getPago();
  }
  ?>

  <form  method="post" action="<?php echo URL; ?>controle-matricula/salvar">
      <label>Codigo</label><br>
      <input type="text" readonly="true" value="<?php echo $cod_matricula ?>" name="codigo"><br>

      <label>Cod Aluno</label><br>
      <input type="text" value="<?php echo $cod_aluno ?>" name="cod_aluno"><br>

      <label>Cod Curso</label><br>
      <input type="text" value="<?php echo $cod_curso ?>" name="cod_curso"><br>

      <label>Data Matricula yyyy/mm/dd</label><br>
      <input type="text" value="<?php echo $data_matricula ?>" name="data_matricula"><br>

      <label>Ano</label><br>
      <input type="text" value="<?php echo $ano ?>" name="ano"><br>

      <label>Ativo</label><br>
      <input type="text" value="<?php echo $ativo ?>" name="ativo"><br>

      <label>Pago</label><br>
      <input type="text" value="<?php echo $pago ?>" name="pago"><br>

      <input class="btn btn-primary" type="submit" value="Salvar">
      <a class="btn btn-primary" href="<?php echo URL; ?>pagina-inicial">Voltar</a><br>
  </form>
</div>
