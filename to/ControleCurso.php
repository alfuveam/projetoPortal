<?php

class ControleCurso implements IPrivateTO{


    public function listaDeCurso() {

        $du = new DaoCurso();
        $cursos = $du->listarTodos();

        $v = new TGui("listaDeCursos");
        $v->addDados("cursos", $cursos);
        $v->renderizar();
    }

    public function editar($id) {

        $p1 = $id[2];
        $du = new DaoCurso();
        $u = $du->listar($p1);
        $v = new TGui("formularioCurso");
        $v->addDados("curso", $u);
        $v->renderizar();
    }

    public function novo() {
        $p = new Curso();
        $v = new TGui("formularioCurso");
        $v->addDados("curso", $p);
        $v->renderizar();
    }

    public function salvar() {
        $u = new Curso();
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : FALSE;

        if (trim($codigo) != "") {
            $u->setCod_curso($codigo);
        }

        $nome = isset($_POST['nome']) ? $_POST['nome'] : FALSE;
        $valor_inscricao = isset($_POST['valor_inscricao']) ? $_POST['valor_inscricao'] : FALSE;
        $periodo = isset($_POST['periodo']) ? $_POST['periodo'] : FALSE;

        $u->setNome($nome);
        $u->setValor_incricao($valor_inscricao);
        $u->setPeriodo($periodo);

        $du = new DaoCurso();
        $cur = $du->salvar($u);

        if ($cur instanceof curso) {
//        Se gravado no banco, entao vai para a pagina inicial
            header("location: " . URL . "pagina-inicial");
        } else {
            echo 'Não foi possivel salvar o Curso';
        }
    }

    public function excluir($id) {
        $p1 = $id[2];
        $du = new DaoCurso();
        $u = $du->listar($p1);
        $v = new TGui("confirmaExclusaoCurso");
        $v->addDados("curso", $u);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['codigo']) ? $_POST['codigo'] : false;

        if ($id) {
            $du = new DaoCurso();
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
