<?= view('layouts/header') ?>
<div class="main-wrapper">
    <?= view('layouts/menu') ?>

    <div class="page-wrapper">
        <?= view('layouts/top_navigation') ?>

        <div class="page-content">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Manage Candil Customers</h6>
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
                                        <tr>
                                            <td>Customer Name</td>
                                            <td>customer@candil.com</td>
                                            <td><span class="badge border border-danger text-danger">Profile Pending</span></td>
                                            <td>1234567899</td>
                                            <td>
                                                <span class="badge border border-danger text-danger">Unverified</span>
                                                <span class="badge border border-danger text-danger">Documents Upload Pending</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-icon">
                                                    <i data-feather="edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </td>
                                        </tr>
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