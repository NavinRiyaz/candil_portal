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
                                <h6 class="card-title">Manage Candil Thesis Categories</h6>
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Cover</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($categories as $value) : ?>
                                            <tr>
                                                <td><?= $value['category_name'] ?></td>
                                                <td><?= $value['category_description'] ?></td>
                                                <td><img src="<?= $value['cover_image'] ?>" alt="Thesis Cover Image" srcset=""></td>
                                                <td>
                                                    <a href="<?= base_url('admin/thesis-category-edit/'.$value['id']) ?>" type="button" class="btn btn-primary btn-icon"><i data-feather="edit"></i></a>
                                                    <a href="<?= base_url('admin/thesis-category-delete/'.$value['id']) ?>" type="button" class="btn btn-danger btn-icon"><i data-feather="trash-2"></i></a>
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