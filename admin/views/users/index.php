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
        DataTables User
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>EMAIL</th>
              <th>PASSWORD</th>
              <th>TYPE</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>EMAIL</th>
              <th>PASSWORD</th>
              <th>TYPE</th>
              <th>ACTION</th>
            </tr>
          </tfoot>
          <tbody>

            <?php
            foreach ($users as $key => $user) : ?>
              <tr>
                <th><?= $user['id'] ?></th>
                <th><?= $user['name'] ?></th>
                <th><?= $user['email'] ?></th>
                <th><?= $user['password'] ?></th>
                <th><?=
                    $user['type'] == 1 ?

                      '<span class="badge-warning badge">ADMIN</span>'

                      :

                      '<span class="badge-success badge">USER</span>'

                    ?></th>
                <th>
                  <a
                  class="btn btn-info"
                  href="<?=BASE_URL_ADMIN ?>?act=user-detail&id=<?= $user['id'] ?>">Show</a>
                </th>
              </tr>

            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>