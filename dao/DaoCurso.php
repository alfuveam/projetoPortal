<?php

class DaoCurso implements IDaoCurso {

    public function excluir(\Curso $u) {
        $sql = "delete FROM curso where cod_curso=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $u->getCod_curso();
        $sth->bindParam("ID", $p1);

        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
        $usu = $sth->fetchObject(get_class(Curso));
        return $usu;
    }

    public function listar($p1) {
        $sql = "SELECT cod_curso, nome, valor_inscricao, periodo FROM curso where cod_curso=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);

        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $usu = $sth->fetchObject("Curso");
        return $usu;
    }

    public function listarTodos() {
        $sql = "SELECT cod_curso, nome, valor_inscricao, periodo from curso";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);

        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        $arCurso = array();

        while ($curso = $sth->fetchObject("Curso")) {
            $arCurso[] = $curso;
        }

        return $arCurso;
    }

    public function salvar(\Curso $c) {
        $cod_curso = $c->getCod_curso();
        $nome = $c->getNome();
        $valor_inscricao = $c->getValor_incricao();
        $periodo = $c->getPeriodo();

        if ($c->getCod_curso()) {
            $id = $c->getCod_curso();
            $sql = "update curso set nome=:nome, valor_inscricao=:valor_inscricao, periodo=:periodo where cod_curso = :id";
        } else {
            $id = $this->generateID();
            $c->setCod_curso($id);
            $sql = "insert into curso (cod_curso, nome, valor_inscricao, periodo) values (:id, :nome, :valor_inscricao, :periodo)";
        }

        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("nome", $nome);
        $sth->bindParam("valor_inscricao", $valor_inscricao);
        $sth->bindParam("periodo", $periodo);

        try {
            $sth->execute();
            return $c;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    private function generateID() {
        $sql = "select (coalesce(max(cod_curso),0)+1) as ID from curso";
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
