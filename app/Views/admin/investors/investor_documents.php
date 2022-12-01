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
                                <h6 class="card-title">Manage Candil Investors Documents</h6>
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profile</th>
                                            <th>ID Proof</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($investors as $value) : ?>
                                            <tr>
                                                <td><?= $value['name'] ?></td>
                                                <td><?= $value['email'] ?></td>
                                                <td>
                                                    <?php if ($value['profile_image'] == null):  ?>
                                                        <span class="badge border border-danger text-danger">Profile Pending</span>
                                                    <?php endif;?>
                                                </td>
                                                <td>
                                                    <?php if ($value['id_proof'] == null):?>
                                                        <span class="badge border border-danger text-danger">Documents Upload pending</span>
                                                    <?php endif; ?>
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