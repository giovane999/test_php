<?php
spl_autoload_register(
    function ($classe){
        require_once 'class/'.$classe.'.php';
        require_once 'models/Models.php';
    }
);

function Redirect($url, $alert, $msg, $time)
{
    $msg =  $_SESSION['msg'] = "<div class='alertas-center2'><p class='alert-$alert col-md-6'>$msg</p></div>";
    echo $msg;
    header("refresh:$time; ".$url);
    die();
}

function baseUri()
{
    $URL_ATUAL= "http://$_SERVER[HTTP_HOST]/test_php";
    echo $URL_ATUAL;
}
