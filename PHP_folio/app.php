<?php
    include_once"model.php";
    $model = new Model();   
    $insert = $model->insert();
    $rows = $model->fetch();
    $number_of_image= $rows;           