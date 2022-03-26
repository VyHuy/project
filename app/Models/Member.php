<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    public $fillable = [
        'name', 'is_leader', 'project_id', 'avatar', 'department', 'salary', 'phone'
    ];
    public function projects(){
        return $this->belongsTo(Project::class, 'project_id');
    }
}
