<?= view('layouts/header') ?>
<div class="main-wrapper">
    <div class="page-wrapper">

        <?= view('layouts/menu') ?>

        <?= view('layouts/top_navigation') ?>

        <div class="page-content">

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                        <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="border-primary"></i></span>
                        <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="printer"></i>
                        Print
                    </button>
                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                        Download Report
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-12 stretch-card">
                    <div class="row flex-grow-1">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="card-title mb-0">New Customers</h6>
                                        <div class="dropdown mb-2">
                                            <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5">
                                            <h3 class="mb-2"><?= $users ?></h3>
                                            <div class="d-flex align-items-baseline">
                                                <!-- <p class="text-success">
                                                  <span></span>
                                                  <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                                </p> -->
                                            </div>
                                        </div>
                                        <!-- <div class="col-6 col-md-12 col-xl-7">
                                          <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="card-title mb-0">New Investors</h6>
                                        <div class="dropdown mb-2">
                                            <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5">
                                            <h3 class="mb-2"><?= $shark ?></h3>
                                            <div class="d-flex align-items-baseline">
                                                <!-- <p class="text-danger">
                                                  <span></span>
                                                  <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                                </p> -->
                                            </div>
                                        </div>
                                        <!-- <div class="col-6 col-md-12 col-xl-7">
                                          <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="card-title mb-0">Bids</h6>
                                        <div class="dropdown mb-2">
                                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5">
                                            <h3 class="mb-2"><?= $bids ?></h3>
                                            <div class="d-flex align-items-baseline">
                                                <!-- <p class="text-success">
                                                  <span>+2.8%</span>
                                                  <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                                </p> -->
                                            </div>
                                        </div>
                                        <!-- <div class="col-6 col-md-12 col-xl-7">
                                          <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-12 col-xl-12 grid-margin stretch-card">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                                <h6 class="card-title mb-0">Auctions</h6>
                                <div class="dropdown">
                                    <a type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row align-items-start">
                                <div class="col-md-7">
                                    <p class="text-muted tx-13 mb-3 mb-md-0">Auction List Status</p>
                                </div>
                            </div>
                            <div id="revenueChart" ></div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline mb-2">
                                <h6 class="card-title mb-0">Biddings</h6>
                                <div class="dropdown mb-2">
                                    <a type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted">Bidding Status Graphical Representation</p>
                            <div id="monthlySalesChart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Brainstorms</h6>
                                <div class="dropdown mb-2">
                                    <a type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </a>
                                </div>
                            </div>
                            <div id="storageChart"></div>
                            <div class="row mb-3">
                                <div class="col-6 d-flex justify-content-end">
                                    <div>
                                        <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total Brainstorms Posted <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                                        <h5 class="fw-bolder mb-0 text-end"><?= $total_brainstorm ?></h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Pending Posted Brainstorms</label>
                                        <h5 class="fw-bolder mb-0"><?= $pending_brainstorm ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">View Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline mb-2">
                                <h6 class="card-title mb-0">Recent Thesis Added</h6>
                                <div class="dropdown mb-2">
                                    <a type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <?php 
                                    if($thesis != null):
                                        foreach($thesis as $value):
                                ?>
                                <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
                                    <div class="me-3">
                                        <img src="<?= $value['cover_image']?>" class="rounded-circle wd-35" alt="user">
                                    </div>
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="text-body mb-2"><?= $value['name']?></h6>
                                            <p class="text-muted tx-12"><?= $value['log']?></p>
                                        </div>
                                        <p class="text-muted tx-13"><?= $value['description']?></p>
                                    </div>
                                </a>
                                <?php endforeach; else: ?>
                                    <p class="text-muted tx-12">No Data Found</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-8 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline mb-2">
                                <h6 class="card-title mb-0">Shark Tank</h6>
                                <div class="dropdown mb-2">
                                    <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">Name</th>
                                        <th class="pt-0">Phone</th>
                                        <th class="pt-0">Email</th>
                                        <th class="pt-0">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if($sharks != null):
                                                $sno = 1;
                                                foreach($sharks as $value):
                                        ?>
                                    <tr>
                                        <td><?= $sno; ?></td>
                                        <td><?= $value['name']; ?></td>
                                        <td><?= $value['phone']; ?></td>
                                        <td><?= $value['email']; ?></td>
                                        <td>
                                            <?php if($value['verified'] == 0): ?>
                                                <span class="badge bg-danger">Un Verified</span>
                                            <?php else:?>
                                                <span class="badge bg-success">Verified</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php
                                                $sno++;
                                            endforeach;
                                        else:
                                    ?>
                                    <span class="badge bg-danger">No Data Found</span>
                                    <?php
                                        endif;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->

        </div>

        <!-- partial:partials/_footer.html -->
        <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
            <p class="text-muted mb-1 mb-md-0">Copyright ?? 2022 <a href="#" target="_blank">Marcom Avenue</a>.</p>
            <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
        </footer>
        <!-- partial -->

    </div>
</div>
<?= view('layouts/footer') ?>