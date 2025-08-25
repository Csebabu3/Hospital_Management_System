<?php
namespace App\Models\Admin;
use CodeIgniter\Model;

class FinanceModel extends Model
{
    protected $table = 'finance';

    public function getFinanceReport($from, $to)
    {
        return $this->where('DATE(date) >=', $from)
                    ->where('DATE(date) <=', $to)
                    ->findAll();
    }
}
