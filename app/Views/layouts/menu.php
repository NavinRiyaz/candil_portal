<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="<?= base_url() ?>" class="sidebar-brand">
            Candil<span>Portal</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="<?= base_url('admin') ?>" class="nav-link active">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">User Management</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#customers" role="button" aria-expanded="false" aria-controls="customers">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Customers</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="customers">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/add-customers') ?>" class="nav-link">Add Customers</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/manage-customers') ?>" class="nav-link">Manage Customers</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/user-documents') ?>" class="nav-link">Documents</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#investors" role="button" aria-expanded="false" aria-controls="investors">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Investors</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="investors">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/add-investors') ?>" class="nav-link">Add Investors</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/manage-investors') ?>" class="nav-link">Manage Investors</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/investors-documents') ?>" class="nav-link">Documents</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#staff" role="button" aria-expanded="false" aria-controls="staff">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Staffs</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="staff">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/add-staffs') ?>" class="nav-link">Add Staffs</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/manage-staffs') ?>" class="nav-link">Manage Staffs</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/staffs-documents') ?>" class="nav-link">Documents</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Candil Modules</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#brainstorm" role="button" aria-expanded="false" aria-controls="brainstorm">
                    <i class="link-icon" data-feather="sun"></i>
                    <span class="link-title">Brain Storm</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="brainstorm">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Brainstorm List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Pending Brainstorms</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Brainstorm Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Manage Categories</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#thesis" role="button" aria-expanded="false" aria-controls="thesis">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Thesis</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="thesis">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Thesis List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Pending Thesis</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Thesis Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Manage Categories</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#hiring" role="button" aria-expanded="false" aria-controls="hiring">
                    <i class="link-icon" data-feather="briefcase"></i>
                    <span class="link-title">Hiring</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="hiring">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Vacant List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Pending Vacants</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Hiring Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Manage Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Applications List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Manage Applications</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link"  data-bs-toggle="collapse" href="#bids" role="button" aria-expanded="false" aria-controls="bids">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">Bids</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="bids">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Bids Wise List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Highest Bids List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Employers List (Bid Wise)</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Bids Settings</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link"  data-bs-toggle="collapse" href="#auctions" role="button" aria-expanded="false" aria-controls="auctions">
                    <i class="link-icon" data-feather="codepen"></i>
                    <span class="link-title">Auctions</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="auctions">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Auction List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Highest Auction List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Job List (Auction Wise)</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Auction Settings</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link"  data-bs-toggle="collapse" href="#shark" role="button" aria-expanded="false" aria-controls="shark">
                    <i class="link-icon" data-feather="codesandbox"></i>
                    <span class="link-title">Shark Tank</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="shark">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Shark Members</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Pending List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Manage Meeting Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Approved Ideas</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Rejected Ideas</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ondate" role="button" aria-expanded="false" aria-controls="ondate">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">On Date</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="ondate">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Schedule List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Documents</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Customization</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#website" role="button" aria-expanded="false" aria-controls="website">
                    <i class="link-icon" data-feather="trello"></i>
                    <span class="link-title">Website Settings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="website">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Hero Image</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contents</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Links & Numbers</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Privacy & Terms</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#mobile" role="button" aria-expanded="false" aria-controls="mobile">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">App Settings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="mobile">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Auth Screens</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Intro Screens</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Settings</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#settings" role="button" aria-expanded="false" aria-controls="settings">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Settings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="settings">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">General Settings</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Config Settings</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Mail Settings</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Send Push Notification</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Developer Support</li>
            <li class="nav-item">
                <a href="#" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="life-buoy"></i>
                    <span class="link-title">Help & Support</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- partial -->