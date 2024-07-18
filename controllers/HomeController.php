<?php

function HomeIndex()
{
    $dataUser = getAllUser();
    require_once PATH_VIEW . 'home.php';
}
//LUỒNG MVC 1: Vào index
//->được điều hướng đến hàm xử lý logic trong controller tương ứng
//->Hàm sẽ trả view luôn vì không có tương tác với model\

//LUỒNG MVC 2: Vào index
//->được điều hướng đến hàm xử lý logic trong controller tương ứng
//->hàm sẽ tương tác với hàm xử lý dữ liệu trong model
//->dữ liệu này sẽ được trả về view