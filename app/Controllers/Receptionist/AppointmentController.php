<?php
namespace App\Controllers\Receptionist;

use App\Models\Receptionist\AppointmentModel;
use App\Models\Receptionist\DoctorModel;
use CodeIgniter\Controller;

class AppointmentController extends Controller
{
    protected $appointmentModel;
    protected $doctorModel;

    public function __construct()
    {
        $this->appointmentModel = new AppointmentModel();
        $this->doctorModel = new DoctorModel();
    }

    public function index()
    {
        $data['receptionist_appointments'] = $this->appointmentModel
            ->select('receptionist_appointments.*, receptionist_doctors.name as doctor_name, receptionist_doctors.specialization')
            ->join('receptionist_doctors', 'receptionist_doctors.id = receptionist_appointments.doctor_id')
            ->orderBy('receptionist_appointments.id','DESC')
            ->findAll();

        return view('receptionist/appointment/list', $data);
    }

    public function create()
    {
        $data['doctors'] = $this->doctorModel->findAll();
        return view('receptionist/appointment/form', $data);
    }

    public function store()
    {
        // Check doctor availability
        $check = $this->appointmentModel
            ->where('doctor_id', $this->request->getPost('doctor_id'))
            ->where('appointment_date', $this->request->getPost('appointment_date'))
            ->where('appointment_time', $this->request->getPost('appointment_time'))
            ->first();

        if ($check) {
            return redirect()->back()->with('error', 'Doctor not available at this time. Choose another slot.');
        }

        $this->appointmentModel->save($this->request->getPost());

        // TODO: Send SMS/Email Reminder (placeholder)
        // service('email')->setTo($patientEmail)->send("Appointment booked!");

        return redirect()->to('receptionist/appointment/list')->with('success','Appointment scheduled successfully.');
    }

    public function edit($id)
    {
        $data['appointment'] = $this->appointmentModel->find($id);
        $data['doctors'] = $this->doctorModel->findAll();
        return view('receptionist/appointment/form', $data);
    }

    public function update($id)
    {
        $this->appointmentModel->update($id, $this->request->getPost());
        return redirect()->to('receptionist/appointment/list')->with('success','Appointment updated successfully.');
    }

    public function delete($id)
    {
        $this->appointmentModel->delete($id);
        return redirect()->to('receptionist/appointment/list')->with('success','Appointment cancelled successfully.');
    }

    public function checkAvailability()
    {
        $doctor_id = $this->request->getGet('doctor_id');
        $date = $this->request->getGet('appointment_date');
        $time = $this->request->getGet('appointment_time');

        $exists = $this->appointmentModel
            ->where('doctor_id', $doctor_id)
            ->where('appointment_date', $date)
            ->where('appointment_time', $time)
            ->first();

        return $this->response->setJSON(['available' => $exists ? false : true]);
    }
}
