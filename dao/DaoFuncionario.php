<?php

class DaoFuncionario implements IDaoFuncionario {

    public function excluir(\Funcionario $u) {
        $sql = "delete FROM funcionario where cod_funcionario=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $u->getCod_funcionario();
        $sth->bindParam("ID", $p1);

        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
        $usu = $sth->fetchObject(get_class(Funcionario));
        return $usu;
    }

    public function listar($p1) {
        $sql = "SELECT cod_funcionario, nome, login, senha FROM funcionario where cod_funcionario=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);

        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        $usu = $sth->fetchObject("Funcionario");

        return $usu;
    }

    public function listarTodos() {
        $sql = "select cod_funcionario, nome, login, senha from funcionario";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);

        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        $arFuncionario = array();

        while ($funcionario = $sth->fetchObject("Funcionario")) {
            $arFuncionario[] = $funcionario;
        }

        return $arFuncionario;
    }

    public function salvar(\Funcionario $u) {
        $nome = $u->getNome();
        $login = $u->getLogin();
        $senha = $u->getSenha();

        if ($u->getCod_funcionario()) {
            $id = $u->getCod_funcionario();
            $sql = "update funcionario set nome=:nome, senha=:senha, login=:login where cod_funcionario=:id";
        } else {
            $id = $this->generateID();
            $u->setCod_funcionario($id);
            $sql = "insert into funcionario (cod_funcionario, nome, login, senha) values (:id, :nome, :login, :senha)";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("nome", $nome);
        $sth->bindParam("login", $login);
        $sth->bindParam("senha", $senha);

        try {
            $sth->execute();
            return $u;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    private function generateID() {
        $sql = "select (coalesce(max(cod_funcionario),0)+1) as ID from funcionario";
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

    public function autenticar($login, $senha) {

        $sql = "select count(1) as U from funcionario where login=:login and senha=:senha";
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("login", $login);
        $sth->bindParam("senha", $senha);

        try {
            $sth->execute();
        } catch (Exception $exc) {
            return $exc->getMessage();
        }

        $res = $sth->fetch();
        $id = $res[0];

        return $id > 0;
    }
}
