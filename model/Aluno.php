<?php

  class Aluno
  {
    function __construct()
    {
      # code...
    }

    private $cod_aluno;
    private $cpf;
    private $rg;
    private $data_nascimento;
    private $telefone;
    private $nome;

    public function getCod_aluno(){
      return $this->cod_aluno;
    }

    public function setCod_aluno($cod_aluno){
      $this->cod_aluno = $cod_aluno;
    }

    public function getCpf(){
      return $this->cpf;
    }

    public function setCpf($cpf){
      $this->cpf = $cpf;
    }

    public function getRg(){
      return $this->rg;
    }

    public function setRg($rg){
      $this->rg = $rg;
    }

    public function getData_nascimento(){
      return $this->data_nascimento;
    }

    public function setData_nascimento($data_nascimento){
      $this->data_nascimento = $data_nascimento;
    }

    public function getTelefone(){
      return $this->telefone;
    }

    public function setTelefone($telefone){
      $this->telefone = $telefone;
    }

    public function getNome(){
      return $this->nome;
    }

    public function setNome($nome){
      $this->nome = $nome;
    }
  }

 ?>
