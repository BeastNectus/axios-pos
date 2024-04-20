<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'gender', 'email', 'user_type', 'hired_date', 'location_id', 'contact_number'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
