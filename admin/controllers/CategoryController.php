<?php


function categoryListAll()
{
    $title =  ' Danh sach category';
    $view  = 'categories/index';
    $script = 'datatable';
    $script2 = 'categories/scripts2';
    $style = 'styles/datatable';

    $categories = listAll('categories');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function categoryshowOne($id)
{
    $category = showOne('categories', $id);
    // debug($category);
    if (empty($category)) {
        e404();
    }
    $title =  'Chi tiet category';
    $view  = 'categories/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function categoryCreate()
{
    $title =  ' Them moi category';
    $view  = 'categories/create';
    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['Name'],
        ];

        $errors = validateCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header('Location: ' . BASE_URL_ADMIN . '?act=category-create');
            exit();
        }
        insert('categories', $data);
        $_SESSION['success'] = 'Thao tác thành công';
        unset($_SESSION['data']);
        header('Location: ' . BASE_URL_ADMIN . '?act=categories');
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCreate($data)
{
    //validate name
    if (empty($data['name'])) {
        $errors[] = 'Truong name la bat buoc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = print_r($data['name']);
        $errors[] = 'Truong name khong duoc qua 50 ky tu';
    } else if (checkUniqueName('categories', $data['name'])) {
        $errors[] = 'Name da duoc su dung';
    }
    return $errors;
};


function validateUpdate($id, $data)
{

    //validate name
    if (empty($data['name'])) {
        $errors[] = 'Truong name la bat buoc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = print_r($data['name']);
        $errors[] = 'Truong name khong duoc qua 50 ky tu';
    } else if (checkUniqueNamelUpdate('categories', $id, $data['name'])) {
        $errors[] = 'Name da duoc su dung';
    }

    return $errors;
};


function categoryUpdate($id)
{
    $category = showOne('categories', $id);
    if (empty($category)) {
        e404();
    }


    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['Name'],
        ];

        $errors = validateUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        } else {
            update('categories', $id, $data);
        }
        unset($_SESSION['data']);
        $_SESSION['success'] = 'Thao tác thành công';
        header('Location: ' . BASE_URL_ADMIN . '?act=category-update&id=' . $id);
        exit();
    }


    $title =  'Cap nhat category';
    $view  = 'categories/update';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryDelete($id)
{
    delete('categories', $id);
    $_SESSION['success'] = 'Thao tác thành công';
    header('Location: ' . BASE_URL_ADMIN . '?act=categories');
}
