<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("BASE", "viagens");

$conn = new mysqli(HOST, USER, PASS, BASE) or die(mysqli_error($conn));

//mudar a data para o formato pt-BR
function ExibeData($data)
{
    return  date("d/m/Y", strtotime($data));
}
