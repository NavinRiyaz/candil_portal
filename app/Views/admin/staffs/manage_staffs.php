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
                                <h6 class="card-title">Manage Candil Staffs</h6>
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profile</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($staffs as $value) : ?>
                                            <tr>
                                                <td><?= $value['name'] ?></td>
                                                <td><?= $value['email'] ?></td>
                                                <td>
                                                    <?php if ($value['profile_image'] == null):  ?>
                                                        <span class="badge border border-danger text-danger">Profile Pending</span>
                                                    <?php endif;?>
                                                </td>
                                                <td><?= $value['phone'] ?></td>
                                                <td>
                                                    <span class="badge border border-danger text-danger"><?= $value['status'] ?></span>
                                                    <?php if ($value['id_proof'] == null):?>
                                                        <span class="badge border border-danger text-danger">Documents Upload pending</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('admin/staffs-edit/'.$value['id']) ?>" type="button" class="btn btn-primary btn-icon"><i data-feather="edit"></i></a>
                                                    <a href="<?= base_url('admin/staffs-delete/'.$value['id']) ?>" type="button" class="btn btn-danger btn-icon"><i data-feather="trash-2"></i></a>
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