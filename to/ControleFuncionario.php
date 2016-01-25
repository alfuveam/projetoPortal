<?php

class ControleFuncionario implements IPrivateTO{


    public function listaDeFuncionario() {

        $du = new DaoFuncionario();
        $funcionarios = $du->listarTodos();

        $v = new TGui("listaDeFuncionarios");
        $v->addDados("funcionarios", $funcionarios);
        $v->renderizar();
    }

    public function editar($id) {

        $p1 = $id[2];
        $du = new DaoFuncionario();
        $u = $du->listar($p1);
        $v = new TGui("formularioFuncionario");
        $v->addDados("funcionario", $u);
        $v->renderizar();
    }

    public function novo() {
        $p = new Funcionario();
        $v = new TGui("formularioFuncionario");
        $v->addDados("funcionario", $p);
        $v->renderizar();
    }

    public function salvar() {
        $u = new Funcionario();
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : FALSE;

        if (trim($codigo) != "") {
            $u->setCod_funcionario($codigo);
        }
        //  Verifica no post
        $nome = isset($_POST['nome']) ? $_POST['nome'] : FALSE;
        if (!$nome || trim($nome) == "") {
            throw new Exception("O campo nome è Obrigatorio!");
        }

        $login = isset($_POST['login']) ? $_POST['login'] : FALSE;
        if (!$login || trim($login) == "") {
            throw new Exception("O campo login è Obrigatorio!");
        }

        $senha = isset($_POST['senha']) ? $_POST['senha'] : FALSE;
        if (!$senha || trim($senha) == "") {
            throw new Exception("O campo senha è Obrigatorio!");
        }

        $u->setNome($nome);
        $u->setLogin($login);
        $u->setSenha($senha);

        $du = new DaoFuncionario();
        $usu = $du->salvar($u);
//        var_dump($usu);
//        die;

        if ($usu instanceof funcionario) {
            header("location: " . URL . "controle-funcionario/lista-de-funcionario");
        } else {
            echo 'Não foi possivel salvar o Funcionario';
        }
    }

    public function excluir($id) {
        $p1 = $id[2];
        $du = new DaoFuncionario();
        $u = $du->listar($p1);
        $v = new TGui("confirmaExclusaoFuncionario");
        $v->addDados("funcionario", $u);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['codigo']) ? $_POST['codigo'] : false;

        if ($id) {
            $du = new DaoFuncionario();
            $u = $du->listar($id);

            if($du->excluir($u)){
                header("location: " . URL . "controle-funcionario/lista-de-funcionario");
            }else{
                echo 'Não foi possivel excluir o registro';
            }

        } else {
            header("location: " . URL . "controle-funcionario/lista-de-funcionario");
        }
    }
}
