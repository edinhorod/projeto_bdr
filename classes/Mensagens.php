<?php

class Mensagens {

    private $mensagens;

    function __construct() {
        $this->mensagens = null;
    }

    public function addMensagem($texto) {
        $this->mensagens[] = $texto;
    }

    public function possuiErro() {
        return $this->mensagens != null;
    }

    public function __toString() {
        return $this->possuiErro() ? "<div>" . join( $this->mensagens) . "</div>" : "";
    }

}
?>
