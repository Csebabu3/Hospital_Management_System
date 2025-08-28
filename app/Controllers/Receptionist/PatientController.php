<?php 
namespace App\Controllers\Receptionist;

use App\Models\Receptionist\PatientModel;
use CodeIgniter\Controller;

class PatientController extends Controller
{
    protected $patientModel;

    public function __construct()
    {
        $this->patientModel = new PatientModel();
    }

    public function index()
    {
        $data['patients'] = $this->patientModel->orderBy('id','DESC')->findAll();
        return view('receptionist/patient/list', $data);
    }

    public function create()
    {
        return view('receptionist/patient/form');
    }

    public function store()
    {
        $this->patientModel->save($this->request->getPost());
        return redirect()->to('receptionist/patient/list')->with('success','Patient registered successfully.');
    }

    public function edit($id)
    {
        $data['patient'] = $this->patientModel->find($id);
        return view('receptionist/patient/form', $data);
    }

    public function update($id)
    {
        $this->patientModel->update($id, $this->request->getPost());
        return redirect()->to('receptionist/patient/list')->with('success','Patient updated successfully.');
    }

    public function delete($id)
    {
        $this->patientModel->delete($id);
        return redirect()->to('receptionist/patient/list')->with('success','Patient deleted successfully.');
    }
}
