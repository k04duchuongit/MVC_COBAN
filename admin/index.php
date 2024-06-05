<?php
//dday la trang admin<?php

//require file trong commons 
require_once '../commons/env.php';
require_once '../commons/helpers.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';


require_file(PATH_CONTROLLER_ADMIN);  // ham nay de require tat car file trong controller
require_file(PATH_MODELS_ADMIN);
//điều hướng

$act = $_GET['act'] ?? '/';
match ($act) {
    '/' => dashboard(),
    'user-detail' => userDetail($_GET['id']),
};



require_once '../commons/disconnect-db.php';
