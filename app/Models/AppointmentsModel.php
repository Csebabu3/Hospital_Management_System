<?php
namespace App\Models;
use CodeIgniter\Model;

class AppointmentsModel extends Model
{
    protected $table = 'doctor_appointments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id','doctor_id','appointment_date','status'];
}
