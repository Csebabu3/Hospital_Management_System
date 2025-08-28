<?php
namespace App\Controllers\Patient;

use App\Models\Patient\MedicalRecordModel;
use App\Models\Patient\DoctorModel;
use CodeIgniter\Controller;

class MedicalRecordController extends Controller
{
    protected $recordModel;
    protected $doctorModel;

    public function __construct()
    {
        $this->recordModel = new MedicalRecordModel();
        $this->doctorModel = new DoctorModel();
    }

    // List all records
    public function index()
    {
        $patientId = session()->get('id'); // Logged-in patient ID
        // $records = $this->recordModel
        //     ->where('patient_id', $patientId)
        //     ->orderBy('record_date', 'DESC')
        //     ->findAll();
$records = $this->recordModel->orderBy('record_date', 'DESC')->findAll();

        foreach ($records as &$r) {
            $doctor = $this->doctorModel->find($r['doctor_id']);
            $r['doctor_name'] = $doctor ? $doctor['name'] : 'N/A';
        }

        return view('patient/medical_records/list', ['records' => $records]);
    }

    // View a single record
    public function view($id)
    {
        $record = $this->recordModel->find($id);
        if (!$record || $record['patient_id'] != session()->get('id')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Record not found.');
        }

        $doctor = $this->doctorModel->find($record['doctor_id']);
        $record['doctor_name'] = $doctor ? $doctor['name'] : 'N/A';

        return view('patient/medical_records/view', ['record' => $record]);
    }

    // Edit record
    public function edit($id)
    {
        $record = $this->recordModel->find($id);
        if (!$record || $record['patient_id'] != session()->get('id')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Record not found.');
        }

        return view('patient/medical_records/edit', ['record' => $record]);
    }

    // Update record
    public function update($id)
    {
        $record = $this->recordModel->find($id);
        if (!$record || $record['patient_id'] != session()->get('id')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Record not found.');
        }

        $this->recordModel->update($id, [
            'diagnosis'    => $this->request->getPost('diagnosis'),
            'prescription' => $this->request->getPost('prescription'),
            'medications'  => $this->request->getPost('medications'),
        ]);

        return redirect()->to('/patient/medical-records')->with('success', 'Record updated successfully.');
    }

    // Download lab report PDF
    public function download($id)
    {
        $record = $this->recordModel->find($id);
        if (!$record || $record['patient_id'] != session()->get('id') || !$record['lab_report']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('File not found.');
        }

        return $this->response->download(FCPATH . 'uploads/' . $record['lab_report'], null);
    }
}
