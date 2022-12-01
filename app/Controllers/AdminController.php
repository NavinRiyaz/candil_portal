<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\InvestorsModel;
use App\Models\StaffsModel;
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
                return view("admin/staffs/add_investors", [
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
                    $session->setFlashdata('success', 'Staffs Registered Successfully');
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

    public function staffDocuments()
    {
        $staffsModel = new StaffsModel();
        $staffs = $staffsModel->findAll();
        return view("admin/staffs/staffs_documents", [
            "staffs" => $staffs,
        ]);
    }
}
