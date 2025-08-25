<?php

namespace App\Controllers;
use App\Models\AppointmentModel;

class AppointmentController extends BaseController
{
    protected $appointmentModel;

    public function __construct()
    {
        $this->appointmentModel = new AppointmentModel();
        helper(['url', 'form', 'session']);
    }

    // List all appointments
    public function index()
    {
        $data['appointments'] = $this->appointmentModel->findAll();
        return view('appointments/index', $data);
    }

    // Show create appointment form
    public function create()
    {
        return view('appointments/create');
    }

    // Store new appointment
    public function store()
    {
        $data = $this->request->getPost();
        if($this->appointmentModel->insert($data)){
            session()->setFlashdata('success', 'Appointment scheduled successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to schedule appointment.');
        }
        return redirect()->to('/appointments');
    }

    // Show edit form
    public function edit($id)
    {
        $appointment = $this->appointmentModel->find($id);
        if(!$appointment){
            session()->setFlashdata('error', 'Appointment not found.');
            return redirect()->to('/appointments');
        }
        return view('appointments/edit', ['appointment' => $appointment]);
    }

    // Update appointment
    public function update($id)
    {
        $data = $this->request->getPost();
        if($this->appointmentModel->update($id, $data)){
            session()->setFlashdata('success', 'Appointment updated successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to update appointment.');
        }
        return redirect()->to('/appointments');
    }

    // Delete appointment
    public function delete($id)
    {
        if($this->appointmentModel->delete($id)){
            session()->setFlashdata('success', 'Appointment deleted successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to delete appointment.');
        }
        return redirect()->to('/appointments');
    }
}
