<?php
namespace App\Models\Patient;

use CodeIgniter\Model;

class DoctorsModel extends Model
{
    protected $table      = 'doctor';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'specialization'];
}
