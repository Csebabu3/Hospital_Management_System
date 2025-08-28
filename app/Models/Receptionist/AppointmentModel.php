<?php 
namespace App\Models\Receptionist;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'receptionist_appointments';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'patient_name', 'patient_phone', 'doctor_id', 
        'appointment_date', 'appointment_time', 'status'
    ];
    protected $useTimestamps = true;
}
