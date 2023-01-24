<?= view('layouts/header') ?>
    <div class="main-wrapper">
        <?= view('layouts/menu') ?>

        <div class="page-wrapper">
            <?= view('layouts/top_navigation') ?>

            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <?php if (session()->getFlashdata('status')): ?>
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('status')  ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Manage Candil Verified Brainstorms</h6>
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>User Details</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Verification</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($brainstorm as $value) : ?>
                                            <tr>
                                                <td><?= $value['name'] ?></td>
                                                <td><?= $value['user'] ?></td>
                                                <td><?= $value['category'] ?></td>
                                                <td><?= $value['description'] ?></td>
                                                <td>
                                                    <?php if($value['verified'] == 1) :?>
                                                        <span class="badge border border-success text-success">Verified</span>
                                                    <?php else :?>
                                                        <span class="badge border border-danger text-danger">Un verified</span>
                                                    <?php endif;?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?= view('layouts/footer_second') ?>
        </div>
    </div>
<?= view('layouts/footer') ?>