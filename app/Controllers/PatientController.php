<?php
namespace App\Controllers;

use App\Models\PatientModel;
use CodeIgniter\Controller;

class PatientController extends Controller
{
    // Show all patients
     public function index()
    {
        $model = new PatientModel();
        $data['patients'] = $model->findAll();
        return view('patients/index', $data);
    }

    // Show add form
    public function create()
    {
        return view('patients/create');
    }

    // Save new patient
    public function store()
    {
        $patientModel = new PatientModel();
        $data = $this->request->getPost();
        $patientModel->save($data);
        return redirect()->to('/patients')->with('success', 'Patient added successfully');
    }

    // Edit form
  public function edit($id = null)
    {
        $model = new PatientModel();
        $patient = $model->find($id);

        if (!$patient) {
            throw PageNotFoundException::forPageNotFound("Patient with id {$id} not found");
        }

        return view('patients/edit', ['patient' => $patient]);
    }

    // Update record
   public function update($id = null)
    {
        $model = new PatientModel();

        // Basic server-side validation example (extend as needed)
        $rules = [
            'name'  => 'required|min_length[2]',
            'email' => 'required|valid_email',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'              => $this->request->getPost('name'),
            'email'             => $this->request->getPost('email'),
            'phone'             => $this->request->getPost('phone'),
            'gender'            => $this->request->getPost('gender'),
            'dob'               => $this->request->getPost('dob'),
            'address'           => $this->request->getPost('address'),
            'treatment_history' => $this->request->getPost('treatment_history'),
            'bills'             => $this->request->getPost('bills'),
            'status'            => $this->request->getPost('status'),
        ];

        $model->update($id, $data);

        return redirect()->to('/patients')->with('success', 'Patient updated successfully');
    }

    // Delete patient
    public function delete($id)
    {
        $patientModel = new PatientModel();
        $patientModel->delete($id);
        return redirect()->to('/patients')->with('success', 'Patient deleted');
    }

    // Approve registration
    public function approve($id)
    {
        $patientModel = new PatientModel();
        $patientModel->update($id, ['status' => 'Approved']);
        return redirect()->to('/patients')->with('success', 'Patient approved');
    }

    // Reject registration
    public function reject($id)
    {
        $patientModel = new PatientModel();
        $patientModel->update($id, ['status' => 'Rejected']);
        return redirect()->to('/patients')->with('success', 'Patient rejected');
    }
}
