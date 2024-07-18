<?php


function tagListAll()
{
    $title =  ' Danh sach tag';
    $view  = 'tags/index';
    $script = 'datatable';
    $script2 = 'tags/scripts2';
    $style = 'styles/datatable';

    $tags = listAll('tags');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tagshowOne($id)
{
    $tag = showOne('tags', $id);
    // debug($tag);
    if (empty($tag)) {
        e404();
    }
    $title =  'Chi tiet tag';
    $view  = 'tags/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tagCreate()
{
    $title =  ' Them moi tag';
    $view  = 'tags/create';
    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['Name'],
        ];

        $errors = validateTagCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header('Location: ' . BASE_URL_ADMIN . '?act=tag-create');
        }
        insert('tags', $data);
        $_SESSION['success'] = 'Thao tác thành công';
        unset($_SESSION['data']);
        header('Location: ' . BASE_URL_ADMIN . '?act=tags');
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateTagCreate($data)
{
    //validate name
    if (empty($data['name'])) {
        $errors[] = 'Truong name la bat buoc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = print_r($data['name']);
        $errors[] = 'Truong name khong duoc qua 50 ky tu';
    } else if (checkUniqueName('tag', $data['name'])) {
        $errors[] = 'Name da duoc su dung';
    }
    return $errors;
};


function validateTagUpdate($id, $data)
{

    //validate name
    if (empty($data['name'])) {
        $errors[] = 'Truong name la bat buoc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = print_r($data['name']);
        $errors[] = 'Truong name khong duoc qua 50 ky tu';
    } else if (checkUniqueNamelUpdate('tag', $id, $data['name'])) {
        $errors[] = 'Name da duoc su dung';
    }

    return $errors;
};


function tagUpdate($id)
{
    $tag = showOne('tags', $id);
    if (empty($tag)) {
        e404();
    }


    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['Name'],
        ];

        $errors = validateTagUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        } else {
            update('tags', $id, $data);
        }
        unset($_SESSION['data']);
        $_SESSION['success'] = 'Thao tác thành công';
        header('Location: ' . BASE_URL_ADMIN . '?act=tag-update&id=' . $id);
        exit();
    }


    $title =  'Cap nhat tag';
    $view  = 'tags/update';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function tagDelete($id)
{
    delete('tags', $id);
    $_SESSION['success'] = 'Thao tác thành công';
    header('Location: ' . BASE_URL_ADMIN . '?act=tags');
}
