<?php
namespace App\Models;
use App\Models\Rental;
use Illuminate\Database\Eloquent\Model;

class Car extends Model{
    protected $fillable = ['name', 'brand', 'model', 'year', 'car_type', 'daily_rent_price', 'availability','image',];
    public function rentals(){
        return $this->hasMany(Rental::class);}
}
