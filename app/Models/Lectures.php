<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lectures extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lectures';

    protected $fillable = ['name',  'user_id', 'subject_id', 'start_time', 'end_time'];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
}
