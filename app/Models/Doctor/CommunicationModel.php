<?php
namespace App\Models\Doctor;
use CodeIgniter\Model;

class CommunicationModel extends Model
{
    protected $table = 'communications';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'sender_role','receiver_role','receiver_id','subject','message','status','created_at'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
