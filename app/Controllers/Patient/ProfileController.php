<?php
namespace App\Controllers\Patient;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('patient/profile/index');
    }
    public function password()
    {
        return view('patient/profile/change_password');
    }
}
