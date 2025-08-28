<?php
namespace App\Models\Receptionist;

use CodeIgniter\Model;

class PatientQueueModel extends Model
{
    protected $table = 'patient_queue';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'patient_name', 'doctor_id', 'status',
        'checkin_time', 'checkout_time'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
