<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function admin()
    {
        return view('dashboards/admin');
    }

    public function doctor()
    {
        return view('dashboards/doctor');
    }

    public function nurse()
    {
        return view('dashboards/nurse');
    }

    public function receptionist()
    {
        return view('dashboards/receptionist');
    }

    public function pharmacist()
    {
        return view('dashboards/pharmacist');
    }

    public function labtech()
    {
        return view('dashboards/labtech');
    }

    public function patient()
    {
        return view('dashboards/patient');
    }
}
