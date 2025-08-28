<?php 
namespace App\Models\Receptionist;

use CodeIgniter\Model;

class BillingForwardModel extends Model
{
    protected $table = 'billing_forward';
    protected $primaryKey = 'id';
    protected $allowedFields = ['billing_id', 'forwarded_to'];
    protected $useTimestamps = true;
}
