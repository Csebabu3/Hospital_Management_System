<?php
namespace App\Models;
use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $table = 'assets';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'asset_name', 'asset_type', 'status', 'purchase_date', 'last_service_date'
    ];
}
