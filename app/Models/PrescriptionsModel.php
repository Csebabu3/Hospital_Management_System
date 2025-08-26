<?php
namespace App\Models;
use CodeIgniter\Model;

class PrescriptionsModel extends Model
{
    protected $table = 'prescriptions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'patient_id','doctor_id','prescription_date','medicines',
        'lab_tests','diet_plan','lifestyle_plan','notes'
    ];
}
