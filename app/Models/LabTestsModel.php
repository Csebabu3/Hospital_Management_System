<?php
namespace App\Models;

use CodeIgniter\Model;

class LabTestsModel extends Model
{
    protected $table = 'lab_test';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'patient_id', 'doctor_id', 'test_name', 'request_date', 'status', 'result', 'remarks'
    ];
}
