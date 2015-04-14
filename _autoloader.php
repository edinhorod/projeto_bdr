<?php

function __autoload($nomeDaClasse) {
    @include_once 'classes/bd/DAO/' . $nomeDaClasse . '.php';
    @include_once 'classes/' . $nomeDaClasse . '.php';
    @include_once 'classes/bd/' . $nomeDaClasse . '.php';
    @include_once 'classes/bd/DAO/' . $nomeDaClasse . '.php';
    
}

?>