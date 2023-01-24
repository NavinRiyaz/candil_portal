<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Brainstorm;
use App\Models\AuctionModel;
use App\Models\BidModel;
use App\Models\BrainstormListModel;
use App\Models\JobModel;
use App\Models\SharkModel;
use App\Models\ThesisListModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class APIController extends BaseController
{
    use ResponseTrait;
    public function brainstormCreate()
    {
        if ($this->request->getVar('uid') !== null){
            $brain = new BrainstormListModel();
            $data = [
                'name' => $this->request->getVar('title'),
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
        if($this->request->getVar("uid") !== null){
            $brain = new BrainstormListModel();
            $data = $brain->where('user', $this->request->getVar("uid"))->findAll();
            return $this->respond($data);  
        }
        
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
        
        if($this->request->getVar("uid") !== null){
            $job = new JobModel();
            $data = $job->where('uid', $this->request->getVar("uid"))->findAll();
            return $this->respond($data);  
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function thesisCreate()
    {
        if ($this->request->getVar('uid') !== null){
            $thesis = new ThesisListModel();
            $file = $this->request->getFile('image');
            $file->move('assets/uploads/thesis');
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
        if($this->request->getVar("uid") !== null){
            $thesis = new ThesisListModel();
            $data = $thesis->where('user', $this->request->getVar("uid"))->findAll();
            return $this->respond($data);  
        }
    }

    public function thesisAllList()
    {
        $thesis = new ThesisListModel();
        $data = $thesis->findAll();
        return $this->respond($data);
    }
    
    public function bidsCreate()
    {
        if ($this->request->getVar('uid') !== null){
            $bids = new BidModel();
            $data = [
                'bid' => $this->request->getVar('bid'),
                'duration' => $this->request->getVar('duration'),
                'description' => $this->request->getVar('description'),
                'milestone' => $this->request->getVar('milestone'),
                'user' => $this->request->getVar('user'),
                'job_id' => $this->request->getVar('job_id'),
                'job_title' => $this->request->getVar('job_title'),
            ];

            $bids->insert($data);
            $response = [
                'status'   => 200,
                'message' => 'Bid Placed Successfully',
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
    public function bidsList(){
        if($this->request->getVar("user") !== null){
            $bids = new BidModel();
            $data = $bids->where('user', $this->request->getVar("user"))->findAll();
            return $this->respond($data);  
        }
    }

    public function auctionCreate(){
        if ($this->request->getVar('user') !== null){
            $auction = new AuctionModel();
            $data = [
                'auction' => $this->request->getVar('auction'),
                'duration' => $this->request->getVar('duration'),
                'description' => $this->request->getVar('description'),
                'user' => $this->request->getVar('user'),
                'job_id' => $this->request->getVar('job_id'),
                'job_title' => $this->request->getVar('job_title'),
            ];

            $auction->insert($data);
            $response = [
                'status'   => 200,
                'message' => 'Auction Placed Successfully',
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

    public function auctionList(){
        if($this->request->getVar('user') !== null){
            $auction = new AuctionModel();
            $data = $auction->where('user', $this->request->getVar('user'))->findAll();
            return $this->respond($data);
        }
    }

    public function uploadResume()
    {
        if ($this->request->getVar('uid') !== null){
            $user = new UserModel();
            $file = $this->request->getFile('resume');
            $file->move('assets/uploads/resume');
            $data = [
                'resume' => $file->getName(),
            ];
            $user->update('user_id', $data);
            $response = [
                'status'   => 200,
                'message' => 'Resume Uploaded Successfully',
            ];
            return $this->respondCreated($response);

        }
    }

    public function uploadDocuments()
    {
        if ($this->request->getVar('uid') !== null){
            $user = new UserModel();
            $file = $this->request->getFile('documents');
            $file->move('assets/uploads/documents');
            $data = [
                'documents' => $file->getName(),
            ];
            $user->update('user_id', $data);
            $response = [
                'status'   => 200,
                'message' => 'Document Uploaded Successfully',
            ];
            return $this->respondCreated($response);

        }
    }

    public function userCreate()
    {
        if ($this->request->getVar('user') !== null){
            $users = new UserModel();
            $data = [
                'user_id' => $this->request->getVar('user'),
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'phone' => $this->request->getVar('phone'),
            ];

            $users->insert($data);
            $response = [
                'status'   => 200,
                'message' => 'User Created Successfully',
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
    
    public function createShark(){
        if($this->request->getVar() !== null){
            $shark = new SharkModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'phone' => $this->request->getVar('phone'),
                'email' => $this->request->getVar('email'),
                'uid' => $this->request->getVar('uid'),
                'verified' => $this->request->getVar('verified'),
            ];
            $shark->insert($data);
            $response = [
                'status'   => 200,
                'message' => 'Shark Member Created Successfully',
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
    
    public function listShark(){
       if($this->request->getVar('uid') !== null){
            $shark = new SharkModel();
            $data = $shark->findAll();
            return $this->respond($data);
        } 
    }
}
