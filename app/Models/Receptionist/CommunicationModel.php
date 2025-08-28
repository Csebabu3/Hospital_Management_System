<?php 
namespace App\Models\Receptionist;

use CodeIgniter\Model;

class CommunicationModel extends Model
{
    protected $table = 'receptionist_communications';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'sender_role', 'receiver_role', 'receiver_name', 
        'subject', 'message', 'status'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
