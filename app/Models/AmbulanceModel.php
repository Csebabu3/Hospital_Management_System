<?php
namespace App\Models;
use CodeIgniter\Model;

class AmbulanceModel extends Model
{
    protected $table = 'ambulances';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'ambulance_no', 'driver_name', 'contact_no', 'availability_status'
    ];
}
