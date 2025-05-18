<?php
namespace App\Models;
use App\Models\Car;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
class Rental extends Model{
    protected $fillable = ['car_id', 'customer_id', 'start_date', 'end_date', 'total_cost', 'status'];
    
    protected $casts = ['start_date' => 'date','end_date' => 'date',];
    public function car(){
        return $this->belongsTo(Car::class, 'car_id');}
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');}            
}
