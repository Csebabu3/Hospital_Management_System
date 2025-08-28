<?php
namespace App\Models\Patient;
use CodeIgniter\Model;

class PatientCommunicationModel extends Model
{
    protected $table = 'patient_communications';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'sender_role','sender_id','receiver_role','receiver_id',
        'subject','message','type','status','created_at','updated_at'
    ];
}
