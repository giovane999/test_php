<!DOCTYPE html>
<?php require_once '../../config/autoload.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
     <link rel="stylesheet" href="<?=baseUri();?>/assets/css/main.css">
     <title>Document</title>
</head>
<body>

<?php 
 
    require_once __DIR__.'/../../includes/hackudao.php';
    $msg =  $_SESSION['msg'] = "<br><div class='alertas-center'><p class='alert-danger col-md-6'><b>Relaxa a Mão ai Hackudão!</b></br>Destino não encontrado</p></div>";
    echo $msg; 
