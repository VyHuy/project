<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    public $fillable = [
        'name', 'code', 'start_date', 'end_date', 'budget'
    ];
    public function member(){
        return $this->hasMany(Member::class, 'project_id');
    }
}
