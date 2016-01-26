<?php

class DaoMatricula implements IDaoMatricula {

    public function excluir(\Matricula $u) {
        $sql = "delete FROM matricula where cod_matricula=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $u->getCod_matricula();
        $sth->bindParam("ID", $p1);

        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
        $usu = $sth->fetchObject(get_class(Matricula));
        return $usu;
    }

    public function listar($p1) {
        $sql = "SELECT cod_matricula, cod_aluno, cod_curso, data_matricula, ano, ativo, pago FROM matricula where cod_matricula=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);

        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $usu = $sth->fetchObject("Matricula");
        return $usu;
    }

    public function listarTodos() {
        $sql = "SELECT cod_matricula, cod_aluno, cod_curso, data_matricula, ano, ativo, pago FROM matricula";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);

        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arMatricula = array();

        while ($matricula = $sth->fetchObject("Matricula")) {
            $arMatricula[] = $matricula;
        }

        return $arMatricula;
    }

    public function salvar(\Matricula $m) {

        $cod_aluno = $m->getCod_aluno();
        $cod_curso = $m->getCod_curso();
        $data_matricula = $m->getData_matricula();
        $ano = $m->getAno();
        $ativo = $m->getAtivo();
        $pago = $m->getPago();

        if ($m->getCod_matricula()) {
            $id = $m->getCod_matricula();
            $sql = "update matricula set cod_aluno=:cod_aluno, cod_curso=:cod_curso, data_matricula=:data_matricula, ativo=:ativo, pago=:pago where cod_matricula = :id";
        } else {
            $id = $this->generateID();
            $m->setCod_matricula($id);
            $sql = "insert into matricula (cod_matricula, cod_aluno, cod_curso, data_matricula, ano, ativo, pago) values (:id, :cod_aluno, :cod_curso, :data_matricula, :ano, :ativo, :pago)";
        }

        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("cod_aluno", $cod_aluno);
        $sth->bindParam("cod_curso", $cod_curso);
        $sth->bindParam("data_matricula", $data_matricula);
        $sth->bindParam("ano", $ano);
        $sth->bindParam("ativo", $ativo);
        $sth->bindParam("pago", $pago);

        try {
            $sth->execute();
            return $m;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    private function generateID() {
        $sql = "select (coalesce(max(cod_matricula),0)+1) as ID from matricula";
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);

        try {
            $sth->execute();
        } catch (Exception $exc) {
            return $exc->getMessage();
        }

        $res = $sth->fetch();
        $id = $res[0];
        return $id;
    }
  }
