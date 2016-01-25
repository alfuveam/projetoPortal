<h2>Deseja excluir este Funcionario: <?php
    $funcionario = $this->getDados("funcionario");
    if ($funcionario instanceof Funcionario) {
        echo $funcionario->getNome();
    }
    ?></h2>

<form method="post" action="<?php echo URL;?>controle-funcionario/confirma-exclusao">
    <input type="hidden" name="codigo" value="<?php
    if ($funcionario instanceof Funcionario) {
        echo $funcionario->getCod_funcionario();
    }
    ?>">
    <input class="btn btn-primary"type="submit" value="Sim">
    <a class="btn btn-primary" href="<?php echo URL; ?>controle-funcionario/lista-de-funcionario">Não</a>
</form>
