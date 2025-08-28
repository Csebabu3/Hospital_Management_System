<?php 
namespace App\Models\Receptionist;

use CodeIgniter\Model;

class BillingModel extends Model
{
    protected $table = 'receptionist_billing';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'patient_name', 'consultation_fee', 'test_charges', 
        'total_amount', 'payment_method', 'insurance_info', 'status'
    ];
    protected $useTimestamps = true;
}
