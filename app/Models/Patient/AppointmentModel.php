<?php 
namespace App\Models\Patient;
use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table      = 'patient_appointments';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'patient_id', 'doctor_id', 'specialization', 'appointment_date', 'status'
    ];
}
