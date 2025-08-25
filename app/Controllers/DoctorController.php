<?php

namespace App\Controllers;
use App\Models\DoctorModel;
use CodeIgniter\Controller;

class DoctorController extends Controller
{
    public function index()
    {
        $model = new DoctorModel();
        $data['doctors'] = $model->findAll();
        return view('doctors/index', $data);
    }

    public function create()
    {
        return view('doctors/create');
    }

    public function store()
    {
        $model = new DoctorModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'department' => $this->request->getPost('department'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'schedule' => $this->request->getPost('schedule'),
        ]);
        return redirect()->to('/doctors');
    }

    public function edit($id)
    {
        $model = new DoctorModel();
        $data['doctor'] = $model->find($id);
        return view('doctors/edit', $data);
    }

    public function update($id)
    {
        $model = new DoctorModel();
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'department' => $this->request->getPost('department'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'schedule' => $this->request->getPost('schedule'),
        ]);
        return redirect()->to('/doctors');
    }

    public function delete($id)
    {
        $model = new DoctorModel();
        $model->delete($id);
        return redirect()->to('/doctors');
    }
}
