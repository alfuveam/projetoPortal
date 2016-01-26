<?php

  interface IDaoMatricula{
    public function listar($p1);

    public function listarTodos();

    public function salvar(Matricula $m);

    public function excluir(Matricula $m);
  }
?>
