<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subjects';

    protected $fillable = ['name', 'class_id', 'user_id', 'subject_name'];

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

    public function lecture()
    {
        return $this->hasMany(Lectures::class, 'subject_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function student()
    {
        return $this->belongsTo(Students::class, 'user_id');
    }
}
