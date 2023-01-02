<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Brainstorm;
use App\Models\BrainstormListModel;
use App\Models\JobModel;
use App\Models\ThesisListModel;
use CodeIgniter\API\ResponseTrait;

class APIController extends BaseController
{
    use ResponseTrait;
    public function brainstormCreate()
    {
        if ($this->request->getVar('uid') !== null){
            $brain = new BrainstormListModel();
            $data = [
                'title' => $this->request->getVar('title'),
                'user' => $this->request->getVar('uid'),
                'category' => $this->request->getVar('category'),
                'description' => $this->request->getVar('description'),
                'base_idea' => $this->request->getVar('base'),
                'first_phase' => $this->request->getVar('firstPhase'),
                'second_phase' => $this->request->getVar('secondPhase'),
                'verified' => $this->request->getVar('verified'),
            ];

            $brain->insert($data);
            $response = [
                'status'   => 200,
                'message' => 'Job Posted Successfully',
            ];
            return $this->respondCreated($response);
        } else {
            $response = [
                'status'   => 404,
                'message' => 'API Not Found',
            ];
            return $this->respond($response);
        }
        
    }

    public function brainstormList()
    {
        $brain = new BrainstormListModel();
        $data['brainstorm'] = $brain->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function jobCreate()
    {
        if ($this->request->getVar('uid') !== null){
            $job = new JobModel();
            $data = [
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'skills' => $this->request->getVar('skills'),
                'tasks' => $this->request->getVar('tasks'),
                'requirements' => $this->request->getVar('requirements'),
                'benefits' => $this->request->getVar('benefits'),
                'uid' => $this->request->getVar('uid'),
                'verified' => $this->request->getVar('verified'),
            ];

            $job->insert($data);
            $response = [
                'status'   => 200,
                'message' => 'Job Posted Successfully',
            ];
            return $this->respondCreated($response);
        } else {
            $response = [
                'status'   => 404,
                'message' => 'API Not Found',
            ];
            return $this->respond($response);
        }
    }

    public function jobList()
    {
      $job = new JobModel();
      $data['jobs'] = $job->orderBy('id', 'DESC')->findAll();
      return $this->respond($data);
    }

    /**
     * @throws \ReflectionException
     */
    public function thesisCreate()
    {
        if ($this->request->getVar('uid') !== null){
            $thesis = new ThesisListModel();
            $file = $this->request->getFile('cover_image');
            if (!$file->isValid()){
                return $this->fail($file->getErrorString());
            } else {
                $file->move('./assets/uploads/thesis');
                $data = [
                    'name' => $this->request->getVar('title'),
                    'user' => $this->request->getVar('uid'),
                    'category' => $this->request->getVar('category'),
                    'description' => $this->request->getVar('description'),
                    'cover_image' => $file->getName(),
                    'verified' => $this->request->getVar('verified'),
                ];
                $thesis->insert($data);
                $response = [
                    'status'   => 200,
                    'message' => 'Thesis Posted Successfully',
                ];
                return $this->respondCreated($response);
            }

        }
        else {
            $response = [
                'status'   => 404,
                'message' => 'API Not Found',
            ];
            return $this->respond($response);
        }
    }
    public function thesisList()
    {
        $thesis = new ThesisListModel();
        $data['thesis'] = $thesis->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
}
