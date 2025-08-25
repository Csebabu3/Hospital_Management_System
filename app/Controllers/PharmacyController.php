<?php

namespace App\Controllers;
use App\Models\PharmacyModel;

class PharmacyController extends BaseController
{
    protected $pharmacyModel;

    public function __construct()
    {
        $this->pharmacyModel = new PharmacyModel();
        helper(['url', 'form', 'session']);
    }

    // List all medicines
    public function index()
    {
        $medicines = $this->pharmacyModel->findAll();
        return view('pharmacy/index', ['medicines' => $medicines]);
    }

    // Show create medicine form
    public function create()
    {
        return view('pharmacy/create');
    }

    // Store new medicine
    public function store()
    {
        $data = $this->request->getPost();
        if($this->pharmacyModel->insert($data)){
            session()->setFlashdata('success', 'Medicine added successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to add medicine.');
        }
        return redirect()->to('/pharmacy');
    }

    // Show edit medicine form
    public function edit($id)
    {
        $medicine = $this->pharmacyModel->find($id);
        if(!$medicine){
            session()->setFlashdata('error', 'Medicine not found.');
            return redirect()->to('/pharmacy');
        }
        return view('pharmacy/edit', ['medicine' => $medicine]);
    }

    // Update medicine
    public function update($id)
    {
        $data = $this->request->getPost();
        if($this->pharmacyModel->update($id, $data)){
            session()->setFlashdata('success', 'Medicine updated successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to update medicine.');
        }
        return redirect()->to('/pharmacy');
    }

    // Delete medicine
    public function delete($id)
    {
        if($this->pharmacyModel->delete($id)){
            session()->setFlashdata('success', 'Medicine deleted successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to delete medicine.');
        }
        return redirect()->to('/pharmacy');
    }
}
