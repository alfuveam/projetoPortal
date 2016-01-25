<?php

  class Funcionario
  {

    function __construct()
    {
      # code...
    }

    private $cod_funcionario;
    private $senha;
    private $login;
    private $pessoa_cod_pessoa;

    private $nome;

    function getNome(){
      return $this->nome;
    }

    function setNome($nome){
      $this->nome = $nome;
    }

    function getCod_funcionario(){
      return $this->cod_funcionario;
    }

    function setCod_funcionario($cod_funcionario){
      $this->cod_funcionario = $cod_funcionario;
    }

    function getSenha(){
      return $this->senha;
    }

    function setSenha($senha){
      $this->senha = $senha;
    }

    function getLogin(){
      return $this->login;
    }

    function setLogin($login){
      $this->login = $login;
    }

    function getCod_pessoa_cod_pessoa(){
      return $this->pessoa_cod_pessoa;
    }

    function setCod_pessoa_cod_pessoa($pessoa_cod_pessoa){
      $this->pessoa_cod_pessoa = $pessoa_cod_pessoa;
    }
  }

 ?>
