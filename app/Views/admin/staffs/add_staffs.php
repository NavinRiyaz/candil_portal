<?= view('layouts/header') ?>
    <div class="main-wrapper">
        <?= view('layouts/menu') ?>

        <div class="page-wrapper">
            <?= view('layouts/top_navigation') ?>

            <div class="page-content">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Staffs Details</h6>
                        <form class="forms-sample" action="<?= base_url('admin/add-staffs') ?>" method="POST">
                            <?= csrf_field(); ?>
                            <?php if (isset($validation)) : ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->listErrors()  ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(session()->get('success')) :?>
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->get("success")  ?>
                                    </div>
                                </div>
                            <?php endif;?>
                            <?php if(session()->get('error')) :?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->get("error")  ?>
                                    </div>
                                </div>
                            <?php endif;?>
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" autocomplete="off" placeholder="Full Name"/>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"/>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password"/>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" autocomplete="off" placeholder="Phone Number"/>
                            </div>
                            <button class="btn btn-primary me-2">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?= view('layouts/footer_second') ?>
        </div>
    </div>

<?= view('layouts/footer') ?>