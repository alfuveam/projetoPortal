<h2>Deseja excluir este Aluno: <?php
    $aluno = $this->getDados("aluno");
    if ($aluno instanceof Aluno) {
        echo $aluno->getNome();
    }
    ?></h2>

<form method="post" action="<?php echo URL;?>controle-aluno/confirma-exclusao">
    <input type="hidden" name="codigo" value="<?php
    if ($aluno instanceof Aluno) {
        echo $aluno->getCod_aluno();
    }
    ?>">
    <input class="btn btn-primary"type="submit" value="Sim">
    <a class="btn btn-primary" href="<?php echo URL; ?>controle-aluno/lista-de-aluno">Não</a>
</form>
