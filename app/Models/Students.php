<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students';

    protected $fillable = ['name', 'class_id', 'user_id', 'date_of_birth', 'gender', 'address', 'phone_number', 'permanent_registration_number'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->hasMany(Subjects::class, 'user_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'user_id', 'user_id');
    }
}
