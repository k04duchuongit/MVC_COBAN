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
    debug($user);
    if(empty($user)){
        e404();
    }
    $title =  'Chi tiet user' . 'Neo o day';
    $view  = 'users/show';

}
function userCreate()
{
    $title =  ' Them moi user';
    $view  = 'users/create';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userUpdate($id)
{
    $title =  'Cap nhat user';
    $view  = 'users/update';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userDelete($id)
{
}
