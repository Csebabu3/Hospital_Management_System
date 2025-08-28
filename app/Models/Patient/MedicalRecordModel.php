<?php
namespace App\Models\Patient;

use CodeIgniter\Model;

class MedicalRecordModel extends Model
{
    protected $table      = 'medical_records';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'patient_id', 'doctor_id', 'diagnosis', 'prescription', 'lab_report', 'medications', 'record_date'
    ];
}
