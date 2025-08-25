<?php
namespace App\Controllers;
use App\Models\LabTechnicianModel;
use App\Models\LabTestModel;

class LabController extends BaseController
{
    protected $technicianModel;
    protected $testModel;

    public function __construct()
    {
        $this->technicianModel = new LabTechnicianModel();
        $this->testModel = new LabTestModel();
        helper(['url','form','session']);
    }

    // ================= LAB TECHNICIANS =================

    public function technicians()
    {
        $technicians = $this->technicianModel->findAll();
        return view('lab/technicians/index', ['technicians'=>$technicians]);
    }

    public function createTechnician()
    {
        return view('lab/technicians/create');
    }

    public function storeTechnician()
    {
        $data = $this->request->getPost();
        if($this->technicianModel->insert($data)){
            session()->setFlashdata('success','Technician added successfully.');
        } else {
            session()->setFlashdata('error','Failed to add technician.');
        }
        return redirect()->to('/lab/technicians');
    }

    public function editTechnician($id)
    {
        $technician = $this->technicianModel->find($id);
        if(!$technician){
            session()->setFlashdata('error','Technician not found.');
            return redirect()->to('/lab/technicians');
        }
        return view('lab/technicians/edit',['technician'=>$technician]);
    }

    public function updateTechnician($id)
    {
        $data = $this->request->getPost();
        if($this->technicianModel->update($id,$data)){
            session()->setFlashdata('success','Technician updated successfully.');
        } else {
            session()->setFlashdata('error','Failed to update technician.');
        }
        return redirect()->to('/lab/technicians');
    }

    public function deleteTechnician($id)
    {
        if($this->technicianModel->delete($id)){
            session()->setFlashdata('success','Technician deleted successfully.');
        } else {
            session()->setFlashdata('error','Failed to delete technician.');
        }
        return redirect()->to('/lab/technicians');
    }

    // ================= LAB TESTS =================

    public function tests()
    {
        $tests = $this->testModel
            ->select('lab_tests.*, lab_technicians.name as technician_name')
            ->join('lab_technicians','lab_tests.assigned_technician_id = lab_technicians.id','left')
            ->orderBy('lab_tests.created_at','DESC')
            ->findAll();
        return view('lab/tests/index',['tests'=>$tests]);
    }

    public function createTest()
    {
        $technicians = $this->technicianModel->findAll();
        return view('lab/tests/create',['technicians'=>$technicians]);
    }

    public function storeTest()
    {
        $file = $this->request->getFile('report_file');
        $filename = null;
        if($file && $file->isValid()){
            $filename = $file->getRandomName();
            $file->move(WRITEPATH.'uploads/reports/',$filename);
        }
        $data = $this->request->getPost();
        $data['report_file'] = $filename;

        if($this->testModel->insert($data)){
            session()->setFlashdata('success','Lab test added successfully.');
        } else {
            session()->setFlashdata('error','Failed to add lab test.');
        }
        return redirect()->to('/lab/tests');
    }

    public function editTest($id)
    {
        $test = $this->testModel->find($id);
        $technicians = $this->technicianModel->findAll();
        if(!$test){
            session()->setFlashdata('error','Lab test not found.');
            return redirect()->to('/lab/tests');
        }
        return view('lab/tests/edit',['test'=>$test,'technicians'=>$technicians]);
    }

    public function updateTest($id)
    {
        $file = $this->request->getFile('report_file');
        $filename = $this->request->getPost('old_report_file');
        if($file && $file->isValid()){
            $filename = $file->getRandomName();
            $file->move(WRITEPATH.'uploads/reports/',$filename);
        }

        $data = $this->request->getPost();
        $data['report_file'] = $filename;

        if($this->testModel->update($id,$data)){
            session()->setFlashdata('success','Lab test updated successfully.');
        } else {
            session()->setFlashdata('error','Failed to update lab test.');
        }
        return redirect()->to('/lab/tests');
    }

    public function deleteTest($id)
    {
        if($this->testModel->delete($id)){
            session()->setFlashdata('success','Lab test deleted successfully.');
        } else {
            session()->setFlashdata('error','Failed to delete lab test.');
        }
        return redirect()->to('/lab/tests');
    }
}
