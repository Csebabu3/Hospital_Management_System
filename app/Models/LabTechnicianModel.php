<?php
namespace App\Models;
use CodeIgniter\Model;

class LabTechnicianModel extends Model
{
    protected $table = 'lab_technicians';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','email','phone','department'];
}
