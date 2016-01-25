
        <div class="container">
            <div class="starter-template">
                <a class="btn btn-danger" href="<?php echo URL; ?>login/logout">
                  <i class="glyphicon glyphicon-remove"></i>Logout</a>
                <a class="btn btn-primary"href="<?php echo URL; ?>controle-aluno/novo"> Novo Aluno</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Controles</th>
                        </tr>
                    <tbody>

                        <?php

                        if ($this->getDados('alunos')) {
                            $ar = $this->getDados('alunos');
                            foreach ($ar as $alunos) {
                                $aluno instanceof Alunos;
                                echo "<tr><td>{$aluno->getCod_aluno()}</td>";
                                echo "<td>{$aluno->getNome()}</td>";

                                echo "<td>"
                                . "<a class=\" btn btn-default\" href=\"" . URL . "controle-aluno/excluir/{$aluno->getCod_aluno()}\">Excluir Aluno</a>"
                                . "  |  <a class=\" btn btn-default\" href=\"" . URL . "controle-aluno/editar/{$aluno->getCod_aluno()}\">Editar Aluno</a>"
                                . "</td></tr>";
                            }
                        }
                        ?>
                      </tbody>
                  </thead>
                </table>
           </div>
         </div>
