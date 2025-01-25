<?php 
namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model 
{
    protected $table = 'cars';
    protected $useTimeStamps = true;
    // Tambahkan kolom yang diizinkan
    protected $allowedFields = ['name', 'brand', 'type', 'price', 'manufacture']; 
}

?>