<?php

  interface IDaoFuncionario{
    public function listar($p1);

    public function listarTodos();

    public function salvar(Funcionario $f);

    public function excluir(Funcionario $f);
  }
?>
