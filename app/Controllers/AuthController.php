<?php

namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function registerUser()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role'     => $this->request->getPost('role')
        ];

        if ($userModel->insert($data)) {
            return redirect()->to('/')->with('success', 'Registration successful. Please login.');
        } else {
            return redirect()->back()->with('error', 'Registration failed. Try again.');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function loginUser()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user', $user);

            // Role-based redirect
            switch($user['role']){
                case 'Admin':
                    return redirect()->to('/dashboard/admin');
                case 'Doctor':
                    return redirect()->to('/dashboard/doctor');
                case 'Nurse':
                    return redirect()->to('/dashboard/nurse');
                case 'Receptionist':
                    return redirect()->to('/dashboard/receptionist');
                case 'Pharmacist':
                    return redirect()->to('/dashboard/pharmacist');
                case 'Lab Technician':
                    return redirect()->to('/dashboard/labtech');
                case 'Patient':
                    return redirect()->to('/dashboard/patient');
                default:
                    return redirect()->to('/');
            }
        } else {
            return redirect()->to('/')->with('error', 'Invalid login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
