<?php
//require tất cả file trên dự án

//require file trong commons
require_once './commons/env.php';
require_once './commons/helpers.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';
require_file(PATH_CONTROLLER);  // ham nay de require tat car file trong controller
require_file(PATH_MODEL);
//điều hướng


// insert(
//     'users',
//     [
//         'name'       => 'duchuong',
//         'email'      => '@jhdfj',
//         'password'   => '349du',
//         'type'       => 1,
//     ]
// );


// update('users',12, [
//     'name'       => 'x',
//     'email'      => 'x',
//     'password'   => '3',
//     'type'       => 1,
// ]);

delete(
    'users',
    2
);

$act = $_GET['act'] ?? '/';
match ($act) {
    '/' => HomeIndex(),
    'user-detail' => userDetail($_GET['id']),
};


require_once './commons/disconnect-db.php';
