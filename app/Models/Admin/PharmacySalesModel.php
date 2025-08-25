<?php
namespace App\Models\Admin;
use CodeIgniter\Model;

class PharmacySalesModel extends Model
{
    protected $table = 'pharmacy_sales';

    public function getSalesReport($from, $to)
    {
        return $this->where('DATE(sale_date) >=', $from)
                    ->where('DATE(sale_date) <=', $to)
                    ->findAll();
    }
}
