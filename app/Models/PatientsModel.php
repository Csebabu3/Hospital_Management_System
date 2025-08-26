<?php
namespace App\Models;
use CodeIgniter\Model;

class PatientsModel extends Model
{
    protected $table = 'doctor_patients';   // ✅ your DB table
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name','age','gender','allergies','medical_history',
        'current_treatment','prescriptions','progress_notes','status'
    ];
}
