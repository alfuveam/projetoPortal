
        <div class="container">
            <div class="starter-template">
                <a class="btn btn-danger" href="<?php echo URL; ?>login/logout">
                  <i class="glyphicon glyphicon-remove"></i>Logout</a>
                <a class="btn btn-primary"href="<?php echo URL; ?>controle-curso/novo"> Novo Curso</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Controles</th>
                        </tr>
                    <tbody>

                        <?php

                        if ($this->getDados('cursos')) {
                            $ar = $this->getDados('cursos');
                            foreach ($ar as $curso) {
                                $curso instanceof Curso;
                                echo "<tr><td>{$curso->getCod_curso()}</td>";
                                echo "<td>{$curso->getNome()}</td>";

                                echo "<td>"
                                . "<a class=\" btn btn-default\" href=\"" . URL . "controle-curso/excluir/{$curso->getCod_curso()}\">Excluir Curso</a>"
                                . "  |  <a class=\" btn btn-default\" href=\"" . URL . "controle-curso/editar/{$curso->getCod_curso()}\">Editar Curso</a>"
                                . "</td></tr>";
                            }
                        }
                        ?>
                      </tbody>
                  </thead>
                </table>
           </div>
         </div>
