<?php
  /**
   *
   */
  class PaginaInicial implements IPrivateTO
  {

    public function __construct()
    {
      $v = new TGui("acaoPaginaInicial");
      $v->renderizar();
    }
  }

 ?>
