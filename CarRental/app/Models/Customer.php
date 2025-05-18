<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model{
    protected $fillable = ['cus_name','cus_add','cus_city','cus_state','cus_postcode','cus_country','cus_phone','user_id'];

    public function user(){
        return $this->belongsTo(User::class);}

    public function rentals(){
        return $this->hasMany(Rental::class, 'customer_id', 'id');}
}
 