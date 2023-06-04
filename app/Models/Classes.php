<?php

namespace App\Models;

use App\Http\Livewire\Subject\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'class';

    protected $fillable = ['department_id', 'name', 'teacher_id'];

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

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }

    public function students()
    {
        return $this->hasMany(Students::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
