<?php

namespace App\Models;
use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'role', 'email', 'phone', 
        'attendance', 'performance', 'salary', 'overtime_hours'
    ];
}
