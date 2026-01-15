<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Contact;
use App\Models\TypeCustomer;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'user_id',
        'type_customer_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function contact() {
        return $this->belongsTo(Contact::class);
    }

    public function typeCustomer() {
        return $this->belongsTo(TypeCustomer::class);
    }
}
