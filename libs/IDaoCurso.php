<?php

  interface IDaoCurso{
    public function listar($p1);

    public function listarTodos();

    public function salvar(Curso $c);

    public function excluir(Curso $c);
  }
?>
