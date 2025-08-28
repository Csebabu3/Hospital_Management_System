<?php 
namespace App\Controllers\Patient;

use App\Models\Patient\AppointmentModel;
use App\Models\Patient\DoctorModel;
use CodeIgniter\Controller;

class AppointmentController extends Controller
{
    protected $appointmentModel;
    protected $doctorModel;

    public function __construct()
    {
        $this->appointmentModel = new AppointmentModel();
        $this->doctorModel      = new DoctorModel();
    }

    // List appointments
    public function index()
    {
        $data['appointments'] = $this->appointmentModel
            ->select('patient_appointments.*, patient_doctors.name as doctor_name, patient_doctors.specialization as doctor_specialization')
            ->join('patient_doctors', 'patient_doctors.id = patient_appointments.doctor_id')
            ->where('patient_id', session()->get('id'))
            ->orderBy('appointment_date', 'DESC')
            ->findAll();

        return view('patient/appointments/list', $data);
    }

    // Book appointment form
    public function create()
    {
        $data['doctors'] = $this->doctorModel->findAll();
        return view('patient/appointments/new', $data);
    }

    // Save appointment
    public function store()
    {
        $this->appointmentModel->save([
            'patient_id'       => session()->get('id'),
            'doctor_id'        => $this->request->getPost('doctor_id'),
            'specialization'   => $this->request->getPost('specialization'),
            'appointment_date' => $this->request->getPost('appointment_date'),
            'status'           => 'Pending'
        ]);

        return redirect()->to('/patient/appointments')->with('success', 'Appointment booked successfully');
    }

    // Reschedule
    public function edit($id)
    {
        $data['appointment'] = $this->appointmentModel->find($id);
        $data['doctors']     = $this->doctorModel->findAll();
        return view('patient/appointments/edit', $data);
    }

    public function update($id)
    {
        $this->appointmentModel->update($id, [
            'doctor_id'        => $this->request->getPost('doctor_id'),
            'specialization'   => $this->request->getPost('specialization'),
            'appointment_date' => $this->request->getPost('appointment_date'),
            'status'           => 'Rescheduled'
        ]);

        return redirect()->to('/patient/appointments')->with('success', 'Appointment rescheduled successfully');
    }

    // Cancel
    public function cancel($id)
    {
        $this->appointmentModel->update($id, ['status' => 'Cancelled']);
        return redirect()->to('/patient/appointments')->with('success', 'Appointment cancelled');
    }
}
