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
                            <h6 class="card-title">Manage Candil Unverified Thesis</h6>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>User Details</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Cover Image</th>
                                        <th>Verification</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($thesis as $value) : ?>
                                        <tr>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['user'] ?></td>
                                            <td><?= $value['category'] ?></td>
                                            <td><?= $value['description'] ?></td>
                                            <td><img src="<?= $value['cover_image'] ?>" alt="Brainstorm Cover Image" srcset=""></td>
                                            <td>
                                                <span class="badge border border-danger text-danger"><?= $value['verified'] ?></span>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/thesis-view/'.$value['id']) ?>" type="button" class="btn btn-primary btn-icon"><i data-feather="book-open"></i></a>
                                                <a href="<?= base_url('admin/thesis-accept/'.$value['id']) ?>" type="button" class="btn btn-success btn-icon"><i data-feather="check-square"></i></a>
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
