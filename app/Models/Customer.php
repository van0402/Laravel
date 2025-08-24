<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
use HasFactory; // 👈 Dòng này rất quan trọng!
  public $timestamps = false; // ko set tg
  protected $fillable = [
    'id_customer',
    'name',
    'phone_customer',
    'email_customer',
    'city_customer'
  ];
    protected $primaryKey = 'id_customer';
    protected $table = 'customer'; 
}


?>