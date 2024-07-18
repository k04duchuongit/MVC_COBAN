<?php


function userListAll()
{
    $title =  ' Danh sach user';
    $view  = 'users/index';
    $script = 'datatable';
    $script2 = 'users/scripts2';
    $style = 'styles/datatable';

    $users = listAll('users');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userShowOne($id)
{
    $user = showOne('users', $id);
    // debug($user);
    if (empty($user)) {
        e404();
    }
    $title =  'Chi tiet user';
    $view  = 'users/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userCreate()
{
    $title =  ' Them moi user';
    $view  = 'users/create';
    if (!empty($_POST)) {
        $data = [
            "email" => $_POST['email'],
            "name" => $_POST['Name'],
            "password" => $_POST['pwd'],
            "type" => $_POST['Type'],
        ];

        $errors = validateUserCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header('Location: ' . BASE_URL_ADMIN . '?act=user-create');
            exit();
        }
        insert('users', $data);
        $_SESSION['success'] = 'Thao tác thành công';
        unset($_SESSION['data']);
        header('Location: ' . BASE_URL_ADMIN . '?act=users');
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUserCreate($data)
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
    } else if (checkUniqueEmail('users', $data['email'])) {
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


function validateUserUpdate($id, $data)
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
    } else if (checkUniqueEmailUpdate('users', $id, $data['email'])) {
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


function userUpdate($id)
{
    $user = showOne('users', $id);
    if (empty($user)) {
        e404();
    }


    if (!empty($_POST)) {
        $data = [
            "email" => $_POST['email'],
            "name" => $_POST['Name'],
            "password" => $_POST['pwd'],
            "type" => $_POST['Type'],

        ];

        $errors = validateUserUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        } else {
            update('users', $id, $data);
        }
        unset($_SESSION['data']);
        $_SESSION['success'] = 'Thao tác thành công';
        header('Location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        exit();
    }


    $title =  'Cap nhat user';
    $view  = 'users/update';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userDelete($id)
{
    delete('users', $id);
    $_SESSION['success'] = 'Thao tác thành công';
    header('Location: ' . BASE_URL_ADMIN . '?act=users');
}
