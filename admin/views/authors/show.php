<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p class="mb-4">
        DataTables is a third party plugin that is used to generate the
        demo table below. For more information about DataTables, please
        visit the
        <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detail Tag
            </h6>
        </div>
        <div class="card-body">
            <table class=table>
                <tr>
                    <td>
                        Trường dữ liệu
                    </td>
                    <td>
                        Dữ liệu
                    </td>
                </tr>
                <?php
                foreach ($tag as $fielName => $data) {
                ?>
                    <tr>
                        <td>
                            <?= ucfirst($fielName) ?>
                        </td>
                        <td>
                            <?= $data ?>
                        </td>
                    </tr>
                <?php  }
                ?>
            </table>
            <a href="<?=BASE_URL_ADMIN.'?act=tags'?>" class="btn btn-danger">Quay về</a>
        </div>
    </div>
</div>