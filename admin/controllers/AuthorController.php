<?php


function authosListAll()
{
    $title =  ' Danh sach authos';
    $view  = 'authors/index';
    $script = 'datatable';
    $script2 = 'author/scripts2';
    $style = 'styles/datatable';

    $author = listAll('authos');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function authosShowOne($id)
{
    $authos = authosShowOne('authors', $id);
    // debug($authos);
    if (empty($authos)) {
        e404();
    }
    $title =  'Chi tiet authos';
    $view  = 'authors/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function authosCreate()
{
    $title =  'Them moi authos';
    $view  = 'authors/create';
    if (!empty($_POST)) {
        $data = [
            "email" => $_POST['email'],
            "name" => $_POST['Name'],
            "password" => $_POST['pwd'],
            "type" => $_POST['Type'],
        ];

        $errors = validateauthosCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header('Location: ' . BASE_URL_ADMIN . '?act=authos-create');
            exit();
        }
        insert('authors', $data);
        $_SESSION['success'] = 'Thao tác thành công';
        unset($_SESSION['data']);
        header('Location: ' . BASE_URL_ADMIN . '?act=authors');
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateauthosCreate($data)
{
    //validate name
    if (empty($data['name'])) {
        $errors[] = 'Truong name la bat buoc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = print_r($data['name']);
        $errors[] = 'Truong name khong duoc qua 50 ky tu';
    }


    //validate email
    if (empty($data['email'])) {
        $errors[] = 'Truong email la bat buoc';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {  // filter_var kiem tra tra ve TF - FILTER_VALIDATE_EMAIL la dieu kien
        $errors[] = 'Truong email khong dung dinh dang';
    } else if (checkUniqueEmail('authors', $data['email'])) {
        $errors[] = 'Email da duoc su dung';
    } else if (strlen($data['email']) > 20) {
        $errors[] = 'Email khong duoc vuot qua 20 ky tu';
    }



    if (empty($data['password'])) {
        $errors[] = 'Truong pass la bat buoc';
    } else if ($data['password'] < 8 || strlen($data['password']) > 20) {  // filter_var kiem tra tra ve TF - FILTER_VALIDATE_EMAIL la dieu kien
        $errors[] = 'Truong pass nho nhat la 8 lon nhat la 20';
    }


    if (!isset($data['type'])) {
        $errors[] = 'Truong type la bat buoc';
    } else if (!in_array($data['type'], [0, 1])) {  // filter_var kiem tra tra ve TF - FILTER_VALIDATE_EMAIL la dieu kien
        $errors[] = 'Tuong type loi';
    }

    return $errors;
};


function validateauthosUpdate($id, $data)
{

    //validate name
    if (empty($data['name'])) {
        $errors[] = 'Truong name la bat buoc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = print_r($data['name']);
        $errors[] = 'Truong name khong duoc qua 50 ky tu';
    }


    //validate email
    if (empty($data['email'])) {
        $errors[] = 'Truong email la bat buoc';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {  // filter_var kiem tra tra ve TF - FILTER_VALIDATE_EMAIL la dieu kien
        $errors[] = 'Truong email khong dung dinh dang';
    } else if (checkUniqueEmailUpdate('authors', $id, $data['email'])) {
        $errors[] = 'Email da duoc su dung';
    } else if (strlen($data['email']) > 20) {
        $errors[] = 'Email khong duoc vuot qua 20 ky tu';
    }



    if (empty($data['password'])) {
        $errors[] = 'Truong pass la bat buoc';
    } else if ($data['email'] < 8 || strlen($data['password']) > 20) {  // filter_var kiem tra tra ve TF - FILTER_VALIDATE_EMAIL la dieu kien
        $errors[] = 'Truong pass nho nhat la 8 lon nhat la 20';
    }


    if (!isset($data['type'])) {
        $errors[] = 'Truong type la bat buoc';
    } else if (!in_array($data['type'], [0, 1])) {  // filter_var kiem tra tra ve TF - FILTER_VALIDATE_EMAIL la dieu kien
        $errors[] = 'Tuong type loi';
    }

    return $errors;
};


function authosUpdate($id)
{
    $authos = showOne('authors', $id);
    if (empty($authos)) {
        e404();
    }


    if (!empty($_POST)) {
        $data = [
            "email" => $_POST['email'],
            "name" => $_POST['Name'],
            "password" => $_POST['pwd'],
            "type" => $_POST['Type'],

        ];

        $errors = validateauthosUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        } else {
            update('authors', $id, $data);
        }
        unset($_SESSION['data']);
        $_SESSION['success'] = 'Thao tác thành công';
        header('Location: ' . BASE_URL_ADMIN . '?act=authos-update&id=' . $id);
        exit();
    }


    $title =  'Cap nhat authos';
    $view  = 'authors/update';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function authosDelete($id)
{
    delete('authors', $id);
    $_SESSION['success'] = 'Thao tác thành công';
    header('Location: ' . BASE_URL_ADMIN . '?act=authors');
}
