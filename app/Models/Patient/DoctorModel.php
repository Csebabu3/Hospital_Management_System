<?php
namespace App\Models\Patient;

use CodeIgniter\Model;

class DoctorModel extends Model
{
    protected $table      = 'doctors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'specialization'];
}
