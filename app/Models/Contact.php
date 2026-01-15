<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'lastname', 'address', 'email', 'phone', 'notes'];

    public function customer() {
        return $this->hasOne(Customer::class);
    }

}
