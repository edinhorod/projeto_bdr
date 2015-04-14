<?php


class Tarefas {
    private $tarId;
    private $tarNome;
    private $tarDescricao;
    private $tarPrioridade;
    
    function __construct($tarId = "", $tarNome = "", $tarDescricao = "", $tarPrioridade = "") {
        $this->tarId = $tarId;
        $this->tarNome = $tarNome;
        $this->tarDescricao = $tarDescricao;
        $this->tarPrioridade = $tarPrioridade;
    }
    function getTarId() {
        return $this->tarId;
    }

    function getTarNome() {
        return $this->tarNome;
    }

    function getTarDescricao() {
        return $this->tarDescricao;
    }

    function getTarPrioridade() {
        return $this->tarPrioridade;
    }

    function setTarId($tarId) {
        $this->tarId = $tarId;
    }

    function setTarNome($tarNome) {
        $this->tarNome = $tarNome;
    }

    function setTarDescricao($tarDescricao) {
        $this->tarDescricao = $tarDescricao;
    }

    function setTarPrioridade($tarPrioridade) {
        $this->tarPrioridade = $tarPrioridade;
    }


}
