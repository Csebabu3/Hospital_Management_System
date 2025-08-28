<?php
namespace App\Models\Receptionist;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'receptionist';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'first_name', 'last_name', 'email', 'phone', 'address', 
        'emergency_contact', 'insurance', 'doctor_id', 
        'department', 'ward', 'admit_date', 'discharge_date', 'status'
    ];
    protected $useTimestamps = true;
}
