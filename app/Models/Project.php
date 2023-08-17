<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table ='projects';
    protected $fillable = [
        'id_user', 'project_name','status','description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
