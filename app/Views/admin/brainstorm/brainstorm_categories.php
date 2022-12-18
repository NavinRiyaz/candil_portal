<?= view('layouts/header') ?>
    <div class="main-wrapper">
        <?= view('layouts/menu') ?>

        <div class="page-wrapper">
            <?= view('layouts/top_navigation') ?>

            <div class="page-content">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Brainstorm Category Details</h6>
                        <form class="forms-sample" action="<?= base_url('admin/brainstorm-categories') ?>" method="POST" enctype="multipart/form-data">
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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="Category Name"/>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Enter Category Description"/>
                            </div>
                            <div class="mb-3">
								<label class="form-label" for="cover">Cover Image</label>
								<input class="form-control" type="file" id="cover" name="cover">
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