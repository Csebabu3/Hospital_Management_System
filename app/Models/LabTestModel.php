<?php
namespace App\Models;
use CodeIgniter\Model;

class LabTestModel extends Model
{
    protected $table = 'lab_tests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_name','test_type','assigned_technician_id','status','report_file'];
}
