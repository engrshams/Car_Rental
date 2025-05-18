<?php
namespace App\Models;
use App\Models\Customer;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use HasFactory, Notifiable;
    protected $fillable = ['otp','role','email','password' ];
    protected $hidden = [//'otp',//'password',
        'remember_token',
    ];

    protected function casts(): array{
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function customer(){
        return $this->hasOne(Customer::class);
    }
    public function rentals(){
        return $this->hasMany(Rental::class);}
}
