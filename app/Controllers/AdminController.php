<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\BrainstormCategories;
use App\Models\BrainstormListModel;
use App\Models\BrainstormCategoryModel;
use App\Models\CustomerModel;
use App\Models\InvestorsModel;
use App\Models\StaffsModel;
use App\Models\ThesisCategoryModel;
use App\Models\ThesisListModel;
use App\Models\UserModel;
use Config\Services;

class AdminController extends BaseController
{
    public function index()
    {
        if (session()->get('role') != "admin") {
            return view("errors/page_not_found");
        }
        return view('admin/dashboard');
    }


    /**
     * ----------------------------------------------------
     * User Management - Customers Management Section Start
     * ----------------------------------------------------
     */

    /**
     * @throws \ReflectionException
     */
    public function addCustomers()
    {
        $data = [];

        if ($this->request->getMethod() == "post"){

            $rules = [
                'fullName' => 'required|min_length[5]|max_length[30]',
                'email' => 'required|min_length[5]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
                'phone' => 'required'
            ];

            if (!$this->validate($rules)){
                return view("admin/user_management/add_customers", [
                    "validation" => $this->validator,
                ]);
            } else {
                $session = session();
                $customerModel = new CustomerModel();
                $data = [
                    'name' => $this->request->getVar('fullName'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                    'phone' => $this->request->getVar('phone'),
                    'role' => 'user',
                    'status' => 'unverified',
                ];
                if ($customerModel->insert($data)){
                    $session->setFlashdata('success', 'Customer Registered Successfully');
                    return redirect()->to(base_url("admin/add-customers"));
                }
            }

        }
        return view('admin/user_management/add_customers');
    }

    public function manageCustomers()
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->findAll();
        return view("admin/user_management/manage_customers", [
            "customers" => $customer,
        ]);
    }

    public function editCustomers($id)
    {
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->find($id);

        return view("admin/user_management/customer_edit", $data);
    }

    /**
     * @throws \ReflectionException
     */
    public function updateCustomers($id){
        $customerModel =  new CustomerModel();
        if ($this->request->getMethod() == 'post') {
            $data = [
                'name' => $this->request->getVar('fullName'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'phone' => $this->request->getVar('phone'),
            ];

            if ($customerModel->update($id, $data)) {
                return redirect()->to(base_url("admin/manage-customers"))->with('status', 'Customer Updated Successfully');
            }
        }
    }

    public function deleteCustomers($id)
    {
        $customer_model = new CustomerModel();
        $customer_model->delete($id);
        return redirect()->to(base_url("admin/manage-customers"))->with('status', 'Customer Deleted');
    }

    public function userDocuments()
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->findAll();
        return view("admin/user_management/user_documents", [
            "customers" => $customer,
        ]);
    }

    /**
     * --------------------------------------------------
     * User Management - Customers Management Section End
     * --------------------------------------------------
     */

    /**
     * ---------------------------------------------------
     * User Management - Investor Management Section Start
     * ---------------------------------------------------
     * @throws \ReflectionException
     */
    public function addInvestors()
    {
        $data = [];

        if ($this->request->getMethod() == "post"){

            $rules = [
                'fullName' => 'required|min_length[5]|max_length[30]',
                'email' => 'required|min_length[5]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
                'phone' => 'required'
            ];

            if (!$this->validate($rules)){
                return view("admin/investors/add_investors", [
                    "validation" => $this->validator,
                ]);
            } else {
                $session = session();
                $investorModel = new InvestorsModel();
                $data = [
                    'name' => $this->request->getVar('fullName'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                    'phone' => $this->request->getVar('phone'),
                    'role' => 'investor',
                    'status' => 'unverified',
                ];
                if ($investorModel->insert($data)){
                    $session->setFlashdata('success', 'Investor Registered Successfully');
                    return redirect()->to(base_url("admin/add-investors"));
                }
            }

        }
        return view('admin/investors/add_investors');
    }

    public function manageInvestors()
    {
        $investorModel = new InvestorsModel();
        $investor = $investorModel->findAll();
        return view("admin/investors/manage_investors", [
            "investors" => $investor,
        ]);
    }

    public function editInvestors($id)
    {
        $investorModel = new InvestorsModel();
        $data['investors'] = $investorModel->find($id);

        return view("admin/investors/investor_edit", $data);
    }

    /**
     * @throws \ReflectionException
     */
    public function updateInvestors($id){
        $investorModel =  new InvestorsModel();
        if ($this->request->getMethod() == 'post') {
            $data = [
                'name' => $this->request->getVar('fullName'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'phone' => $this->request->getVar('phone'),
            ];

            if ($investorModel->update($id, $data)) {
                return redirect()->to(base_url("admin/manage-investors"))->with('status', 'Investors Updated Successfully');
            }
        }
    }

    public function deleteInvestors($id)
    {
        $investors_model = new InvestorsModel();
        $investors_model->delete($id);
        return redirect()->to(base_url("admin/manage-investors"))->with('status', 'Investors Deleted');
    }

    public function investorDocuments()
    {
        $investorModel = new InvestorsModel();
        $investors = $investorModel->findAll();
        return view("admin/investors/investor_documents", [
            "investors" => $investors,
        ]);
    }
    /**
     * --------------------------------------------------
     * User Management - Investors Management Section End
     * --------------------------------------------------
     */

    /**
     * --------------------------------------------------
     * User Management - Staffs Management Section Start
     * --------------------------------------------------
     */
    public function addStaffs()
    {
        $data = [];

        if ($this->request->getMethod() == "post"){

            $rules = [
                'fullName' => 'required|min_length[5]|max_length[30]',
                'email' => 'required|min_length[5]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
                'phone' => 'required'
            ];

            if (!$this->validate($rules)){
                return view("admin/staffs/add_staffs", [
                    "validation" => $this->validator,
                ]);
            } else {
                $session = session();
                $staffsModel = new StaffsModel();
                $data = [
                    'name' => $this->request->getVar('fullName'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                    'phone' => $this->request->getVar('phone'),
                    'role' => 'staffs',
                    'status' => 'unverified',
                ];
                if ($staffsModel->insert($data)){
                    $session->setFlashdata('success', 'Staff Registered Successfully');
                    return redirect()->to(base_url("admin/add-staffs"));
                }
            }

        }
        return view('admin/staffs/add_staffs');
    }

    public function manageStaffs()
    {
        $staffsModel = new StaffsModel();
        $staffs = $staffsModel->findAll();
        return view("admin/staffs/manage_staffs", [
            "staffs" => $staffs,
        ]);
    }

    public function editStaffs($id)
    {
        $staffsModel = new StaffsModel();
        $data['staffs'] = $staffsModel->find($id);

        return view("admin/staffs/staffs_edit", $data);
    }

    /**
     * @throws \ReflectionException
     */
    public function updateStaffs($id){
        $staffsModel =  new StaffsModel();
        if ($this->request->getMethod() == 'post') {
            $data = [
                'name' => $this->request->getVar('fullName'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'phone' => $this->request->getVar('phone'),
            ];

            if ($staffsModel->update($id, $data)) {
                return redirect()->to(base_url("admin/manage-staffs"))->with('status', 'Staffs Updated Successfully');
            }
        }
    }

    public function deleteStaffs($id)
    {
        $staffs_model = new StaffsModel();
        $staffs_model->delete($id);
        return redirect()->to(base_url("admin/manage-staffs"))->with('status', 'Staff Deleted');
    }

    public function staffsDocuments()
    {
        $staffsModel = new StaffsModel();
        $staffs = $staffsModel->findAll();
        return view("admin/staffs/staffs_documents", [
            "staffs" => $staffs,
        ]);
    }
    /**
     * -------------------------------------------------
     * User Management - Staffs Management Section Start
     * -------------------------------------------------
     */
    /**
     * -------------------------------------------------
     * Candil modules - BrainStorm Management Section Start
     * -------------------------------------------------
     */
    public function brainstormLists() {
        $brainstormListModel = new BrainstormListModel();
        $brainstormList = $brainstormListModel->findAll();
        return view("admin/brainstorm/brainstorm_list", [
            "brainstorm" => $brainstormList,
        ]);
    }
    public function brainstormPendingList()
    {
        $brainstormListModel = new BrainstormListModel();
        $brainstormList = $brainstormListModel->where('verified', 'unverified')->findAll();
        return view("admin/brainstorm/brainstorm_pending_list", [
            "brainstorm" => $brainstormList,
        ]);
    }
    public function brainstormCategories()
    {
        $data = [];

        if ($this->request->getMethod() == "post"){

            $rules = [
                'name' => 'required|min_length[3]|max_length[12]',
                'description' => 'required|max_length[150]',
                'cover' => [
                  'rules' => 'uploaded[cover]|max_size[cover, 1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png]',
                ],
            ];

            $errors = [
                'name' => [
                    'required' => 'Name Must be Required',
                    'min_length' => 'Name must be has minimum 3 Characters',
                    'max_length' => 'Name not more than 12 Characters',
                ],
                'cover' => [
                    'uploaded' => 'Please upload your category image',
                    'max_size' => 'Your Uploaded image has too big',
                    'mime_in' => 'Please upload only JPG, JPEG, GIF and PNG'
                ],
            ];

            if (!$this->validate($rules, $errors)){
                return view("admin/brainstorm/brainstorm_categories", [
                    "validation" => $this->validator,
                ]);
            } else {
                $file = $this->request->getFile("cover");

                $session = session();
                $category_image = $file->getName();
                if ($file->move("images/categories", $category_image)){

                    $categoryModel = new BrainstormCategoryModel();
                    $data = [
                        'category_name' => $this->request->getVar('name'),
                        'category_description' => $this->request->getVar('description'),
                        'category_image' => 'assets/images/categories/' . $category_image,
                    ];

                    if ($categoryModel->insert($data)){
                        $session->setFlashdata('success', 'Category Saved Successfully');
                        return redirect()->to(base_url("admin/brainstorm/brainstorm-categories"));
                    } else {
                        $session->setFlashdata('error', 'Failed to Save Category Try Again');
                    }
                } else {
                    $session->setFlashdata('error', 'Your Image cannot be uploaded Please try again later.');
                }
            }

        }
        return view('admin/brainstorm/brainstorm_categories');
    }
    public function manageBrainstormCategories()
    {
        $categoryModel = new BrainstormCategoryModel();
        $category = $categoryModel->findAll();
        return view("admin/brainstorm/manage_brainstorm_categories", [
            "categories" => $category,
        ]);
    }
    public function editBrainstormCategories($id)
    {
        $categoryModel = new BrainstormCategoryModel();
        $data['category'] = $categoryModel->find($id);

        return view("admin/brainstorm/brainstorm_category_edit", $data);
    }

    /**
     * @throws \ReflectionException
     */
    public function updateBrainstormCategories($id){
        $categoryModel = new BrainstormCategoryModel();
        if ($this->request->getMethod() == 'post') {
            $file = $this->request->getFile("cover");
            $category_image = $file->getName();
            if (!$category_image){
                $data = [
                    'category_name' => $this->request->getVar('name'),
                    'category_description' => $this->request->getVar('description'),
                ];

                $categoryModel->update($id, $data);
                return redirect()->to(base_url("admin/brainstorm/manage-brainstorm"))->with('status', 'Category Updated Successfully');

            } else {
                    if ($file->move("assets/images/categories/", $category_image)){
                        $data = [
                            'category_name' => $this->request->getVar('name'),
                            'category_description' => $this->request->getVar('description'),
                            'category_image' => 'assets/images/categories/' . $category_image,
                        ];

                        $categoryModel->update($id, $data);
                        return redirect()->to(base_url("admin/brainstorm/manage-brainstorm"))->with('status', 'Category Updated Successfully');
                    }
            }
        }
    }

    public function deleteBrainstormCategories($id)
    {
        $categoryModel = new BrainstormCategoryModel();
        $categoryModel->delete($id);
        return redirect()->to(base_url("admin/brainstorm/manage-brainstorm"))->with('status', 'Category Deleted');
    }
    
    public function viewBrainstorm($id)
    {
        
    }
    public function acceptBrainstorm($id)
    {
        $brainstormListModel = new BrainstormListModel();
        $data = [
            'verified' => 'verified',
        ];
        $brainstormListModel->update($id, $data);
        return redirect()->to(base_url("admin/brainstorm/brainstorm-pending-list"))->with('status', 'Brainstorm Successfully Accepted');
    }
    /**
     * -------------------------------------------------
     * Candil modules - BrainStorm Management Section End
     * -------------------------------------------------
     */
    /**
     * -------------------------------------------------
     * Candil modules - Thesis Management Section Start
     * -------------------------------------------------
     */
    public function thesisLists() {
        $thesisListModel = new ThesisListModel();
        $thesisList = $thesisListModel->findAll();
        return view("admin/thesis/thesis_list", [
            "thesis" => $thesisList,
        ]);
    }
    public function thesisPendingList()
    {
        $thesisListModel = new ThesisListModel();
        $thesisList = $thesisListModel->where('verified', 'unverified')->findAll();
        return view("admin/thesis/thesis_pending_list", [
            "thesis" => $thesisList,
        ]);
    }
    public function thesisCategories()
    {
        $data = [];

        if ($this->request->getMethod() == "post"){

            $rules = [
                'name' => 'required|min_length[3]|max_length[12]',
                'description' => 'required|max_length[150]',
                'cover' => [
                    'rules' => 'uploaded[cover]|max_size[cover, 1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png]',
                ],
            ];

            $errors = [
                'name' => [
                    'required' => 'Name Must be Required',
                    'min_length' => 'Name must be has minimum 3 Characters',
                    'max_length' => 'Name not more than 12 Characters',
                ],
                'cover' => [
                    'uploaded' => 'Please upload your category image',
                    'max_size' => 'Your Uploaded image has too big',
                    'mime_in' => 'Please upload only JPG, JPEG, GIF and PNG'
                ],
            ];

            if (!$this->validate($rules, $errors)){
                return view("admin/thesis/thesis_categories", [
                    "validation" => $this->validator,
                ]);
            } else {
                $file = $this->request->getFile("cover");

                $session = session();
                $category_image = $file->getName();
                if ($file->move("images/categories", $category_image)){

                    $categoryModel = new ThesisCategoryModel();
                    $data = [
                        'category_name' => $this->request->getVar('name'),
                        'category_description' => $this->request->getVar('description'),
                        'category_image' => 'assets/images/categories/' . $category_image,
                    ];

                    if ($categoryModel->insert($data)){
                        $session->setFlashdata('success', 'Category Saved Successfully');
                        return redirect()->to(base_url("admin/thesis/thesis-categories"));
                    } else {
                        $session->setFlashdata('error', 'Failed to Save Category Try Again');
                    }
                } else {
                    $session->setFlashdata('error', 'Your Image cannot be uploaded Please try again later.');
                }
            }

        }
        return view('admin/thesis/thesis_categories');
    }
    public function manageThesisCategories()
    {
        $categoryModel = new ThesisCategoryModel();
        $category = $categoryModel->findAll();
        return view("admin/thesis/manage_thesis_categories", [
            "categories" => $category,
        ]);
    }
    public function editThesisCategories($id)
    {
        $categoryModel = new ThesisCategoryModel();
        $data['category'] = $categoryModel->find($id);

        return view("admin/thesis/thesis_category_edit", $data);
    }

    /**
     * @throws \ReflectionException
     */
    public function updateThesisCategories($id){
        $categoryModel = new ThesisCategoryModel();
        if ($this->request->getMethod() == 'post') {
            $file = $this->request->getFile("cover");
            $category_image = $file->getName();
            if (!$category_image){
                $data = [
                    'category_name' => $this->request->getVar('name'),
                    'category_description' => $this->request->getVar('description'),
                ];

                $categoryModel->update($id, $data);
                return redirect()->to(base_url("admin/thesis/manage-thesis"))->with('status', 'Category Updated Successfully');

            } else {
                if ($file->move("assets/images/categories/", $category_image)){
                    $data = [
                        'category_name' => $this->request->getVar('name'),
                        'category_description' => $this->request->getVar('description'),
                        'category_image' => 'assets/images/categories/' . $category_image,
                    ];

                    $categoryModel->update($id, $data);
                    return redirect()->to(base_url("admin/thesis/manage-thesis"))->with('status', 'Category Updated Successfully');
                }
            }
        }
    }

    public function deleteThesisCategories($id)
    {
        $categoryModel = new BrainstormCategoryModel();
        $categoryModel->delete($id);
        return redirect()->to(base_url("admin/thesis/manage-thesis"))->with('status', 'Category Deleted');
    }

    public function viewThesis($id)
    {

    }
    public function acceptThesis($id)
    {
        $brainstormListModel = new BrainstormListModel();
        $data = [
            'verified' => 'verified',
        ];
        $brainstormListModel->update($id, $data);
        return redirect()->to(base_url("admin/thesis/thesis-pending-list"))->with('status', 'Brainstorm Successfully Accepted');
    }
    /**
     * -------------------------------------------------
     * Candil modules - Thesis Management Section End
     * -------------------------------------------------
     */
    /**
     * -------------------------------------------------
     * Candil modules - Hiring Management Section Start
     * -------------------------------------------------
     */
    public function vacantList()
    {
        return view("admin/hiring/vacant_list");
    }

    public function pendingVacant()
    {
        return view("admin/hiring/pending_vacant");
    }

    public function hiringCategories()
    {
        return view("admin/hiring/hiring_categories");
    }

    public function manageHiringCategories()
    {
        return view("admin/hiring/manage_categories");
    }

    public function applicationList()
    {
        return view("admin/hiring/application_list");
    }
}
