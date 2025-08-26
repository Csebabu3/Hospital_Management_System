<?php
namespace App\Controllers\Doctor;

use App\Controllers\BaseController;
use App\Models\LabTestsModel;

class LabTests extends BaseController
{
    protected $labTestsModel;

    public function __construct()
    {
        $this->labTestsModel = new LabTestsModel();
        helper(['url','form']);
    }

    public function index()
    {
        $data['lab_tests'] = $this->labTestsModel->findAll();
        return view('doctor/laboratory/index', $data);
    }

    public function request()
    {
        return view('doctor/laboratory/request');
    }

    public function store()
    {
        $this->labTestsModel->save([
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id'  => $this->request->getPost('doctor_id'),
            'test_name'  => $this->request->getPost('test_name'),
            'status'     => 'Requested'
        ]);

        return redirect()->to('doctor/lab-tests')->with('success','Lab test requested');
    }

    public function view($id)
    {
        $data['lab_test'] = $this->labTestsModel->find($id);
        return view('doctor/laboratory/view', $data);
    }

    public function edit($id)
    {
        $data['lab_test'] = $this->labTestsModel->find($id);
        return view('doctor/laboratory/edit', $data);
    }

    public function update($id)
    {
        $this->labTestsModel->update($id, [
            'status'  => $this->request->getPost('status'),
            'result'  => $this->request->getPost('result'),
            'remarks' => $this->request->getPost('remarks')
        ]);

        return redirect()->to('doctor/lab-tests/view/'.$id)->with('success','Lab test updated');
    }
}
