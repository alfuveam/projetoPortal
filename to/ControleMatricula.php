<?php

class ControleMatricula implements IPrivateTO{


    public function listaDeMatricula() {

        $du = new DaoMatricula();
        $matriculas = $du->listarTodos();

        $v = new TGui("listaDeMatriculas");
        $v->addDados("matriculas", $matriculas);
        $v->renderizar();
    }

    public function editar($id) {

        $p1 = $id[2];
        $du = new DaoMatricula();
        $u = $du->listar($p1);
        $v = new TGui("formularioMatricula");
        $v->addDados("matricula", $u);
        $v->renderizar();
    }

    public function novo() {
        $p = new Matricula();
        $v = new TGui("formularioMatricula");
        $v->addDados("matricula", $p);
        $v->renderizar();
    }

    public function salvar() {
        $u = new Matricula();
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : FALSE;

        if (trim($codigo) != "") {
            $u->setCod_matricula($codigo);
        }

        $cod_aluno = isset($_POST['cod_aluno']) ? $_POST['cod_aluno'] : FALSE;
        $cod_curso = isset($_POST['cod_curso']) ? $_POST['cod_curso'] : FALSE;
        $data_matricula = isset($_POST['data_matricula']) ? $_POST['data_matricula'] : FALSE;
        $ano = isset($_POST['ano']) ? $_POST['ano'] : FALSE;
        $ativo = isset($_POST['ativo']) ? $_POST['ativo'] : FALSE;
        $pago = isset($_POST['pago']) ? $_POST['pago'] : FALSE;

        $u->setCod_aluno($cod_aluno);
        $u->setCod_curso($cod_curso);
        $u->setData_matricula($data_matricula);
        $u->setAno($ano);
        $u->setAtivo($ativo);
        $u->setPago($pago);

        $du = new DaoMatricula();
        $mat = $du->salvar($u);

        if ($mat instanceof matricula) {
//        Se gravado no banco, entao vai para a pagina inicial
            header("location: " . URL . "pagina-inicial");
        } else {
            echo 'Não foi possivel salvar o Aluno';
        }
    }

    public function excluir($id) {
        $p1 = $id[2];
        $du = new DaoMatricula();
        $u = $du->listar($p1);
        $v = new TGui("confirmaExclusaoMatricula");
        $v->addDados("aluno", $u);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['codigo']) ? $_POST['codigo'] : false;

        if ($id) {
            $du = new DaoMatricula();
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
?>
