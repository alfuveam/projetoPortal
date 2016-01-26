<h2>Deseja excluir este Curso: <?php
    $curso = $this->getDados("curso");
    if ($curso instanceof Curso) {
        echo $curso->getNome();
    }
    ?></h2>

<form method="post" action="<?php echo URL;?>controle-curso/confirma-exclusao">
    <input type="hidden" name="codigo" value="<?php
    if ($curso instanceof Curso) {
        echo $curso->getCod_curso();
    }
    ?>">
    <input class="btn btn-primary"type="submit" value="Sim">
    <a class="btn btn-primary" href="<?php echo URL; ?>controle-curso/lista-de-aluno">Não</a>
</form>
