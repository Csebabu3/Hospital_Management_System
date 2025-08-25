<?php

namespace App\Controllers;
use App\Models\StaffModel;

class StaffController extends BaseController
{
    protected $staffModel;

    public function __construct()
    {
        $this->staffModel = new StaffModel();
        helper(['url', 'form', 'session']);
    }

    // List all staff
    public function index()
    {
        $data['staffList'] = $this->staffModel->findAll();
        return view('staff/index', $data);
    }

    // Show create form
    public function create()
    {
        return view('staff/create');
    }

    // Store new staff
    public function store()
    {
        $data = $this->request->getPost();
        if($this->staffModel->insert($data)){
            session()->setFlashdata('success','Staff added successfully.');
        } else {
            session()->setFlashdata('error','Failed to add staff.');
        }
        return redirect()->to('/staff');
    }

    // Show edit form
    public function edit($id)
    {
        $staff = $this->staffModel->find($id);
        if(!$staff){
            session()->setFlashdata('error','Staff not found.');
            return redirect()->to('/staff');
        }
        return view('staff/edit', ['staff' => $staff]);
    }

    // Update staff
    public function update($id)
    {
        $data = $this->request->getPost();
        if($this->staffModel->update($id, $data)){
            session()->setFlashdata('success','Staff updated successfully.');
        } else {
            session()->setFlashdata('error','Failed to update staff.');
        }
        return redirect()->to('/staff');
    }

    // Delete staff
    public function delete($id)
    {
        if($this->staffModel->delete($id)){
            session()->setFlashdata('success','Staff deleted successfully.');
        } else {
            session()->setFlashdata('error','Failed to delete staff.');
        }
        return redirect()->to('/staff');
    }
}
