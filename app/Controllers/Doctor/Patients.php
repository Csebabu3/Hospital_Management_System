<?php
namespace App\Controllers\Doctor;

use App\Controllers\BaseController;
use App\Models\PatientsModel;   // ✅ make sure file is PatientsModel.php

class Patients extends BaseController
{
    protected $patientsModel;

    public function __construct()
    {
        $this->patientsModel = new PatientsModel();
        helper(['url', 'form']);
    }

    public function index()
    {
        $data['patients'] = $this->patientsModel->findAll();
        return view('doctor/patients/index', $data);
    }

    public function view($id)
    {
        $data['patient'] = $this->patientsModel->find($id);
        return view('doctor/patients/view', $data);
    }

    public function edit($id)
    {
        $data['patient'] = $this->patientsModel->find($id);
        return view('doctor/patients/edit', $data);
    }

    public function update($id)
    {
        $notes = $this->request->getPost('progress_notes');
        $this->patientsModel->update($id, [
            'progress_notes' => $notes
        ]);

        return redirect()->to('doctor/patients/view/'.$id)
                         ->with('success','Progress notes updated');
    }
}
