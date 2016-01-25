<?php

class ControleAluno implements IPrivateTO{


    public function listaDeAluno() {

        $du = new DaoAluno();
        $alunos = $du->listarTodos();

        $v = new TGui("listaDeAlunos");
        $v->addDados("alunos", $alunos);
        $v->renderizar();
    }

    public function editar($id) {

        $p1 = $id[2];
        $du = new DaoAluno();
        $u = $du->listar($p1);
        $v = new TGui("formularioAluno");
        $v->addDados("aluno", $u);
        $v->renderizar();
    }

    public function novo() {
        $p = new Aluno();
        $v = new TGui("formularioAluno");
        $v->addDados("aluno", $p);
        $v->renderizar();
    }

    public function salvar() {
        $u = new Aluno();
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : FALSE;

        if (trim($codigo) != "") {
            $u->setCod_aluno($codigo);
        }
        //  Verifica no post
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : FALSE;
        if (!$cpf || trim($cpf) == "") {
            throw new Exception("O campo cpf è Obrigatorio!");
        }

        $u->setCpf($cpf);
        $u->setRg($rg);
        $u->setData_nascimento($data_nascimento);
        $u->setNome($nome);
        $u->setTelefone($telefone);

        $du = new DaoAluno();
        $usu = $du->salvar($u);

        if ($usu instanceof aluno) {
//        Se gravado no banco, entao vai para a pagina inicial
            header("location: " . URL . "pagina-inicial");
        } else {
            echo 'Não foi possivel salvar o Aluno';
        }
    }

    public function excluir($id) {
        $p1 = $id[2];
        $du = new DaoAluno();
        $u = $du->listar($p1);
        $v = new TGui("confirmaExclusaoAluno");
        $v->addDados("aluno", $u);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['codigo']) ? $_POST['codigo'] : false;

        if ($id) {
            $du = new DaoAluno();
            $u = $du->listar($id);

            if($du->excluir($u)){
                header("location: " . URL . "pagina-inicial");
            }else{
                echo 'Não foi possivel excluir o registro';
            }

        } else {
            header("location: " . URL . "pagina-inicial");
        }
    }
}
