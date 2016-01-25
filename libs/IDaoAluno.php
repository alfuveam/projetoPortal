<?php

  interface IDaoAluno{
    public function listar($p1);

    public function listarTodos();

    public function salvar(Aluno $f);

    public function excluir(Aluno $f);
  }
?>
