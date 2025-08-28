<?php
namespace App\Controllers\Receptionist;

use App\Models\Receptionist\PatientQueueModel;
use App\Models\DoctorModel;
use CodeIgniter\Controller;

class QueueController extends Controller
{
    protected $queueModel;
    protected $doctorModel;

    public function __construct()
    {
        $this->queueModel = new PatientQueueModel();
        $this->doctorModel = new DoctorModel();
    }

    // Show all queue entries
    public function index()
    {
        $data['queue'] = $this->queueModel
            ->select('patient_queue.*, receptionist_doctors.name as doctor_name, receptionist_doctors.specialization')
            ->join('receptionist_doctors', 'receptionist_doctors.id = patient_queue.doctor_id')
            ->orderBy('patient_queue.id', 'ASC')
            ->findAll();

        return view('receptionist/queue/list', $data);
    }

    // Show add patient form
    public function create()
    {
        $data['receptionist_doctors'] = $this->doctorModel->findAll();
        return view('receptionist/queue/form', $data);
    }

    // Store patient in queue
    public function store()
    {
        $this->queueModel->save([
            'patient_name' => $this->request->getPost('patient_name'),
            'doctor_id'    => $this->request->getPost('doctor_id'),
            'status'       => 'Waiting'
        ]);

        return redirect()->to(base_url('receptionist/queue/list'))
                         ->with('success', 'Patient added to queue.');
    }

    // Mark Check-in
    public function checkin($id)
    {
        $this->queueModel->update($id, [
            'status' => 'CheckedIn',
            'checkin_time' => date('Y-m-d H:i:s')
        ]);

        // TODO: Notification to doctor can be added here.
        return redirect()->to(base_url('receptionist/queue/list'))
                         ->with('success', 'Patient checked in & doctor notified.');
    }

    // Mark Check-out
    public function checkout($id)
    {
        $this->queueModel->update($id, [
            'status' => 'Completed',
            'checkout_time' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('receptionist/queue/list'))
                         ->with('success', 'Patient checked out.');
    }

    // Delete queue entry
    public function delete($id)
    {
        $this->queueModel->delete($id);
        return redirect()->to(base_url('receptionist/queue/list'))
                         ->with('success', 'Queue entry removed.');
    }
}
