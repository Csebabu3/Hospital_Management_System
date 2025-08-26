<?php
namespace App\Controllers\Doctor;

use App\Controllers\BaseController;
use App\Models\AppointmentsModel;
use App\Models\PatientsModel;

class Appointments extends BaseController
{
    protected $appointmentsModel;
    protected $patientsModel;

    public function __construct()
    {
        $this->appointmentsModel = new AppointmentsModel();
        $this->patientsModel = new PatientsModel();
        helper(['url', 'form']);
    }

    // List all appointments
    public function index()
    {
        $data['appointments'] = $this->appointmentsModel->findAll();
        return view('doctor/appointments/index', $data);
    }

    // View appointment details
    public function view($id)
    {
        $data['appointment'] = $this->appointmentsModel->find($id);
        $data['patient'] = $this->patientsModel->find($data['appointment']['patient_id']);
        return view('doctor/appointments/view', $data);
    }

    // Edit appointment status
    public function edit($id)
    {
        $data['appointment'] = $this->appointmentsModel->find($id);
        $data['patient'] = $this->patientsModel->find($data['appointment']['patient_id']);
        return view('doctor/appointments/edit', $data);
    }

    // Update status
    public function update($id)
    {
        $status = $this->request->getPost('status');
        $this->appointmentsModel->update($id, ['status' => $status]);
        return redirect()->to('doctor/appointments/view/'.$id)
                         ->with('success','Appointment status updated.');
    }
}
