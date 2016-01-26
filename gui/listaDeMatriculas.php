
        <div class="container">
            <div class="starter-template">
                <a class="btn btn-danger" href="<?php echo URL; ?>login/logout">
                  <i class="glyphicon glyphicon-remove"></i>Logout</a>
                <a class="btn btn-primary"href="<?php echo URL; ?>controle-matricula/novo"> Novo Matricula</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Controles</th>
                        </tr>
                    <tbody>

                        <?php

                        if ($this->getDados('matriculas')) {
                            $ar = $this->getDados('matriculas');
                            foreach ($ar as $matricula) {
                                $matricula instanceof Matricula;
                                echo "<tr><td>{$matricula->getCod_matricula()}</td>";

                                echo "<td>"
                                . "<a class=\" btn btn-default\" href=\"" . URL . "controle-matricula/excluir/{$matricula->getCod_matricula()}\">Excluir Matricula</a>"
                                . "  |  <a class=\" btn btn-default\" href=\"" . URL . "controle-matricula/editar/{$matricula->getCod_matricula()}\">Editar Matricula</a>"
                                . "</td></tr>";
                            }
                        }
                        ?>
                      </tbody>
                  </thead>
                </table>
           </div>
         </div>
