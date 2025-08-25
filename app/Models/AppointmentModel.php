<?php

namespace App\Models;
use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'patient_name', 'patient_email', 'doctor_name', 
        'appointment_date', 'appointment_time', 'status'
    ];
}
