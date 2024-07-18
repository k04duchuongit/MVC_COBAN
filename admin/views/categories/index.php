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
        DataTables
      </h6>
      <a href="<?= BASE_URL_ADMIN . '?act=category-create' ?>" class="btn btn-primary mt-2">Create category</a>
    </div>
    <div class="card-body">
      <?php
      if (isset($_SESSION['success'])) :
      ?>
        <div class="alert alert-success">
          <?=
          $_SESSION['success'];
          ?>
        </div>
        <?php
        unset($_SESSION['success']);
        ?>
      <?php
      endif;
      ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>

              <th>ACTION</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>ACTION</th>
            </tr>
          </tfoot>
          <tbody>
            <?php if (isset($categories)) : ?>
              <?php
              foreach ($categories as $key => $category) : ?>
                <tr>
                  <th><?= $category['id'] ?></th>
                  <th><?= $category['name'] ?></th>
                  <th>
                    <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=category-detail&id=<?= $category['id'] ?>">Show</a>
                    <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>?act=category-update&id=<?= $category['id'] ?>">Update</a>
                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=category-delete&id=<?= $category['id'] ?>">Delete</a>
                  </th>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>