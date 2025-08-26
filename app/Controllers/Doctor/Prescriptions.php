<?php
namespace App\Controllers\Doctor;

use App\Controllers\BaseController;
use App\Models\PrescriptionsModel;
use App\Models\PatientsModel;

class Prescriptions extends BaseController
{
    protected $prescriptionsModel;
    protected $patientsModel;

    public function __construct()
    {
        $this->prescriptionsModel = new PrescriptionsModel();
        $this->patientsModel = new PatientsModel();
        helper(['url', 'form']);
    }

    // List all prescriptions
    public function index()
    {
        $data['prescriptions'] = $this->prescriptionsModel->findAll();
        return view('doctor/prescriptions/index', $data);
    }

    // Show create form for a patient
    public function create($patient_id)
    {
        $data['patient'] = $this->patientsModel->find($patient_id);
        return view('doctor/prescriptions/create', $data);
    }

    // Save prescription
    public function store()
    {
        $this->prescriptionsModel->save([
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'medicines' => $this->request->getPost('medicines'),
            'lab_tests' => $this->request->getPost('lab_tests'),
            'diet_plan' => $this->request->getPost('diet_plan'),
            'lifestyle_plan' => $this->request->getPost('lifestyle_plan'),
            'notes' => $this->request->getPost('notes'),
        ]);

        return redirect()->to('doctor/prescriptions')->with('success', 'Prescription added.');
    }

    // View prescription
    public function view($id)
    {
        $data['prescription'] = $this->prescriptionsModel->find($id);
        $data['patient'] = $this->patientsModel->find($data['prescription']['patient_id']);
        return view('doctor/prescriptions/view', $data);
    }

    // Edit prescription
    public function edit($id)
    {
        $data['prescription'] = $this->prescriptionsModel->find($id);
        $data['patient'] = $this->patientsModel->find($data['prescription']['patient_id']);
        return view('doctor/prescriptions/edit', $data);
    }

    // Update prescription
    public function update($id)
    {
        $this->prescriptionsModel->update($id, [
            'medicines' => $this->request->getPost('medicines'),
            'lab_tests' => $this->request->getPost('lab_tests'),
            'diet_plan' => $this->request->getPost('diet_plan'),
            'lifestyle_plan' => $this->request->getPost('lifestyle_plan'),
            'notes' => $this->request->getPost('notes'),
        ]);

        return redirect()->to('doctor/prescriptions/view/'.$id)->with('success', 'Prescription updated.');
    }
}
