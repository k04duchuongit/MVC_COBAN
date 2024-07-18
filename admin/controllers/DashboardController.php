 <?php
    function dashboard()
    {
        $view = 'dashboard';  // day la bien de thay doi content chinh cua giao dien admin
        $scripts = 'dashboard';  // dung de load js theo trang
        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }

    if (!function_exists('e404')) {
        function e404()
        {
            $view = 'e404';
            $scripts = '';
            require_once PATH_VIEW_ADMIN . 'layouts/partials/e404.php';
        }
    }
