<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
                $session->setFlashdata('success', 'User Registered Successfully');
                return redirect()->to(base_url("admin/add-customers"));
            }

        }
        return view('admin/user_management/add_customers');
    }

    public function manageCustomers()
    {
       return view('admin/user_management/manage_customers');
    }
}
