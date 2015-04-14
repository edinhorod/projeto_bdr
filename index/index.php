<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php include_once '../includes/_title.php'; ?></title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body data-spy="scroll" data-target="#menu" data-offset="80">
        <div class="container pageTop">
            <div class="row">
                <?php
                include_once '../_menu.php';
                ?>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    1. Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima
                    “Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos
                    de ambos (3 e 5), imprima “FizzBuzz”.
                </div>
                <div class="panel-body">
                    <a href="../question01/" title="Exercício 01">Ver Exercício 01</a>
                </div>
                
                <div class="panel-heading">
                    2. Refatore o código abaixo, fazendo as alterações que julgar necessário.
                </div>
                <div class="panel-body">
                    <a href="../question02/" title="Exercício 02">Ver Exercício 02</a>
                </div>
                
                <div class="panel-heading">
                    3. Refatore o código abaixo, fazendo as alterações que julgar necessário.
                </div>
                <div class="panel-body">
                    <a href="../question03/" title="Exercício 03">Ver Exercício 03</a>
                </div>
                
                <div class="panel-heading">
                    4. Desenvolva uma API Rest para um sistema gerenciador de tarefas (inclusão/alteração/exclusão).<br />
                        As tarefas consistem em título e descrição, ordenadas por prioridade
                </div>
                <div class="panel-body">
                    <a href="../question04/" title="Exercício 04">Ver Exercício 04</a>
                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/main.js" type="text/javascript"></script>
    </body>
</html>
