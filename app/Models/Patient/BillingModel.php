<?php
namespace App\Models\Patient;

use CodeIgniter\Model;

class BillingModel extends Model
{
    protected $table = 'billing';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id','description','amount','status','created_at'];
}
