<?php
namespace App\Models;
use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','age','gender','admission_date','doctor_id','status','created_at'];

    // Daily patient inflow
    public function getPatientInflow($from, $to)
    {
        return $this->where('DATE(created_at) >=', $from)
                    ->where('DATE(created_at) <=', $to)
                    ->findAll();
    }
}
