<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php include_once '../includes/_title.php'; ?></title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
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
                    <?php
                    for ($i = 1; $i < 101; $i++) {
                        if ($i % 3 == 0 && $i % 5 == 0) {
                            echo 'FizzBuzz<br />';
                        } else if ($i % 3 == 0) {
                            echo 'Fizz<br />';
                        } else if ($i % 5 == 0) {
                            echo 'Buzz<br />';
                        }
                        if ($i % 3 != 0 && $i % 5 != 0) {
                            echo $i . "<br />";
                        }
                        //
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/main.js" type="text/javascript"></script>
    </body>
</html>
