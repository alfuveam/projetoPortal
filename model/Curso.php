<?php

  class Curso
  {
    function __construct()
    {
      # code...
    }

    private $cod_curso;
    private $nome;
    private $valor_inscricao;
    private $periodo;

    public function setCod_curso($cod_curso){
      $this->cod_curso = $cod_curso;
    }

    public function getCod_curso(){
      return $this->cod_curso;
    }

    public function setNome($nome){
      $this->nome = $nome;
    }

    public function getNome(){
      return $this->nome;
    }
    public function setValor_incricao($valor_inscricao){
      $this->valor_inscricao = $valor_inscricao;
    }

    public function getValor_incricao(){
      return $this->valor_inscricao;
    }

    public function setPeriodo($periodo){
      $this->periodo = $periodo;
    }

    public function getPeriodo(){
      return $this->periodo;
    }
  }

 ?>
