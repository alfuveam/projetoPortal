<h2>Deseja excluir este Matricula: <?php
    $matricula = $this->getDados("matricula");
    if ($matricula instanceof Matricula) {
        echo $matricula->getNome();
    }
    ?></h2>

<form method="post" action="<?php echo URL;?>controle-matricula/confirma-exclusao">
    <input type="hidden" name="codigo" value="<?php
    if ($matricula instanceof Matricula) {
        echo $matricula->getCod_matricula();
    }
    ?>">
    <input class="btn btn-primary"type="submit" value="Sim">
    <a class="btn btn-primary" href="<?php echo URL; ?>controle-matricula/lista-de-matricula">Não</a>
</form>
