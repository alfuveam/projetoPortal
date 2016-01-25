<?php
  /**
   *
   */
  class Matricula
  {

    function __construct(argument)
    {

    }

    private $cod_matricula;
    private $cod_aluno;
    private $cod_curso;
    private $data_matricula;
    private $ano;
    private $ativo;
    private $pago;

    public function setCod_matricula($cod_matricula){
     $this->cod_matricula = $cod_matricula;
    }

    public function getCod_matricula(){
      return $this->cod_matricula;
    }

    public function setCod_aluno($cod_aluno){
     $this->cod_aluno = $cod_aluno;
    }

    public function getCod_aluno(){
      return $this->cod_aluno;
    }

    public function setCod_curso($cod_curso){
     $this->cod_curso = $cod_curso;
    }

    public function getCod_curso(){
      return $this->cod_curso;
    }

    public function setData_matricula($data_matricula){
     $this->data_matricula = $data_matricula;
    }

    public function getData_matricula(){
      return $this->data_matricula;
    }

    public function setAno($ano){
     $this->ano = $ano;
    }

    public function getAno(){
      return $this->ano;
    }

    public function setAtivo($ativo){
     $this->ativo = $ativo;
    }

    public function getAtivo(){
      return $this->ativo;
    }

    public function setPago($pago){
     $this->pago = $pago;
    }

    public function getPago(){
      return $this->pago;
    }
  }

 ?>
