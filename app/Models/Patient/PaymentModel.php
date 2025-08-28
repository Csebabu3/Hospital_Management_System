<?php
namespace App\Models\Patient;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['billing_id','patient_id','method','amount','paid_at'];
}
