<?php

class DaoALuno implements IDaoAluno {

    public function excluir(\Aluno $u) {
        $sql = "delete FROM aluno where cod_aluno=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $u->getCod_aluno();
        $sth->bindParam("ID", $p1);

        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
        $usu = $sth->fetchObject(get_class(Aluno));
        return $usu;
    }

    public function listar($p1) {
        $sql = "SELECT cod_aluno, cpf, rg, data_nascimento, nome, telefone FROM aluno where cod_aluno=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);

        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        $usu = $sth->fetchObject("Aluno");

        return $usu;
    }

    public function listarTodos() {
        $sql = "SELECT cod_aluno, cpf, rg, data_nascimento, nome, telefone from aluno";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);

        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        $arAluno = array();

        while ($aluno = $sth->fetchObject("Aluno")) {
            $arAluno[] = $aluno;
        }

        return $arAluno;
    }

    public function salvar(\Aluno $u) {
        //$cod_aluno = $u->getCod_aluno();
        $cpf = $u->getCpf();
        $rg = $u->getRg();
        $data_nascimento = $u->getData_nascimento();
        $nome = $u->getNome();
        $telefone = $u->getTelefone();

        if ($u->getCod_aluno()) {
            $id = $u->getCod_aluno();
            $sql = "update aluno set cpf:=cpf, rg:=rg, data_nascimento:=data_nascimento, nome:=nome, telefone:=telefone where cod_aluno=:id";
        } else {
            $cod_aluno = $this->generateID();
            $u->setCod_aluno($cod_aluno);
            $sql = "insert into aluno (cod_aluno, cpf, rg, data_nascimento, nome, telefone) values (:cod_aluno, :cpf, :rg, :data_nascimento, :nome, :telefone)";
        }

        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("cod_aluno", $cod_aluno);
        $sth->bindParam("cpf", $cpf);
        $sth->bindParam("rg", $rg);
        $sth->bindParam("data_nascimento", $data_nascimento);
        $sth->bindParam("nome", $nome);
        $sth->bindParam("telefone", $telefone);

        try {
            $sth->execute();

            return $u;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    private function generateID() {
        $sql = "select (coalesce(max(cod_aluno),0)+1) as ID from aluno";
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
