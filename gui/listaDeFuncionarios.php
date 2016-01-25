
        <div class="container">
            <div class="starter-template">
                <a class="btn btn-danger" href="<?php echo URL; ?>login/logout">
                  <i class="glyphicon glyphicon-remove"></i>Logout</a>
                <a class="btn btn-primary"href="<?php echo URL; ?>controle-funcionario/novo"> Novo Funcionario</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Controles</th>
                        </tr>
                    <tbody>

                        <?php

                        if ($this->getDados('funcionarios')) {
                            $ar = $this->getDados('funcionarios');
                            foreach ($ar as $funcionario) {
                                $funcionario instanceof Funcionario;
                                echo "<tr><td>{$funcionario->getCod_funcionario()}</td>";
                                echo "<td>{$funcionario->getNome()}</td>";

                                echo "<td>"
                                . "<a class=\" btn btn-default\" href=\"" . URL . "controle-funcionario/excluir/{$funcionario->getCod_funcionario()}\">Excluir Funcionario</a>"
                                . "  |  <a class=\" btn btn-default\" href=\"" . URL . "controle-funcionario/editar/{$funcionario->getCod_funcionario()}\">Editar Funcionario</a>"
                                . "</td></tr>";
                            }
                        }
                        ?>
                      </tbody>
                  </thead>
                </table>
           </div>
         </div>
