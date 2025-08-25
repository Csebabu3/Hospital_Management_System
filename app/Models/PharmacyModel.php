<?php

namespace App\Models;
use CodeIgniter\Model;

class PharmacyModel extends Model
{
    protected $table = 'medicines';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name','manufacturer','quantity','price','expiry_date','low_stock_threshold'
    ];
}
