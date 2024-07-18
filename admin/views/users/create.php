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
                Create user
            </h6>
        </div>
        <div class="card-body">
           
            <div class="alert alert-danger">
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
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="Name" class="form-label">Name:</label>
                    <input type="Name" class="form-control" id="Name" placeholder="Enter Name" name="Name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['password'] : null ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="Type" class="form-label">Type:</label>
                    <select name="Type" id="Type" class="form-control">
                        <option value="0" <?= isset($_SESSION['data']) && $_SESSION['data'] == 0 ? 'selected' : null ?>>Admin</option>
                        <option value="1" <?= isset($_SESSION['data']) && $_SESSION['data'] == 1 ? 'selected' : null ?>>Member</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN . '?act=users' ?>" class="btn btn-danger">Quay về</a>
            </form>
        </div>
    </div>
</div>