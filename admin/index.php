<?php
session_start();
//dday la trang admin<?php

//require file trong commons 
require_once '../commons/env.php';
require_once '../commons/helpers.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';


require_file(PATH_CONTROLLER_ADMIN);  // ham nay de require tat car file trong controller
require_file(PATH_MODEL_ADMIN);
//điều hướng

$act = $_GET['act'] ?? '/';
match ($act) {
    '/' => dashboard(),
    //CRUD user
    'users' => userListAll(),
    'user-detail' => userShowOne($_GET['id']),
    'user-create' => userCreate(),
    'user-update' => userUpdate($_GET['id']),
    'user-delete' => userDelete($_GET['id']),


    //CRUD tag
    'tags' => tagListAll(),
    'tag-detail' => tagShowOne($_GET['id']),
    'tag-create' => tagCreate(),
    'tag-update' => tagUpdate($_GET['id']),
    'tag-delete' => tagDelete($_GET['id']),


    //CRUD CATEGORY
    'categories' => categoryListAll(),
    'category-detail' => categoryShowOne($_GET['id']),
    'category-create' => categoryCreate(),
    'category-update' => categoryUpdate($_GET['id']),
    'category-delete' => categoryDelete($_GET['id']),

    //CRUD AUTHOR
    'authos' => authosListAll(),
    'authos-detail' => authosShowOne($_GET['id']),
    'authos-create' => authosCreate(),
    'authos-update' => authosUpdate($_GET['id']),
    'authos-delete' => authosDelete($_GET['id']),
};



require_once '../commons/disconnect-db.php';
