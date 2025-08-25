<?php
namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'email', 'phone', 'gender', 'dob', 'address', 
        'treatment_history', 'bills', 'status'
    ];
}
