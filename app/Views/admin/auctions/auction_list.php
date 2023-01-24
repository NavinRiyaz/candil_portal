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
                                <h6 class="card-title">Manage Candil All Auction List on Jobs</h6>
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                        <tr>
                                            <th>Job Name</th>
                                            <th>Job ID</th>
                                            <th>Auction Value</th>
                                            <th>Project Duration</th>
                                            <th>User ID</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($auction as $value) : ?>
                                            <tr>
                                                <td><?= $value['job_title'] ?></td>
                                                <td><?= $value['job_id'] ?></td>
                                                <td><?= $value['bid'] ?></td>
                                                <td><?= $value['duration'] ?></td>
                                                <td><?= $value['user'] ?></td>
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