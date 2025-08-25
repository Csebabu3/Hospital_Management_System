<?php
namespace App\Models\Admin;
use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';

    public function getDoctorConsultations($from, $to)
    {
        return $this->where('DATE(appointment_date) >=', $from)
                    ->where('DATE(appointment_date) <=', $to)
                    ->findAll();
    }
}
