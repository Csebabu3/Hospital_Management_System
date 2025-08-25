<?php
namespace App\Models;
use CodeIgniter\Model;

class WardModel extends Model
{
    protected $table = 'wards';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'ward_name',
        'room_no',
        'bed_count',
        'available_beds',
        'cleaning_status',
        'allocation_status'
    ];
}
