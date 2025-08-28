<?php 
namespace App\Models\Receptionist;

use CodeIgniter\Model;

class DoctorModel extends Model
{
    protected $table = 'receptionist_doctors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'specialization', 'email', 'phone'];
}
