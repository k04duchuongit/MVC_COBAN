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
                Update tag <?= $tag['name'] ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="alert">
                <?php
                if (isset($_SESSION['success'])) :
                ?>
                    <div class="alert alert-success">
                        <?=
                        $_SESSION['success'];
                        ?>
                    </div>
            </div>
            <?php
                    unset($_SESSION['success']);
            ?>
        <?php
                endif;
        ?>
        <ul>
            <?php
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $key => $error) {  ?>
                    <li><?= $error ?></li>
            <?php   }
            }
            unset($_SESSION['errors']);
            ?>
        </ul>
        </div>
        <form action="" method="POST">
            <div class="mb-3 mt-3">
                <label for="Name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="Name" value="<?= $tag['name'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?= BASE_URL_ADMIN . '?act=tags' ?>" class="btn btn-danger">Quay về</a>
        </form>
    </div>
</div>
</div>