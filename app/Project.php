<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProjectFile;

class Project extends Model
{

    protected $table = 'project';

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function files()
    {
        return $this->hasMany(ProjectFile::class, 'id_project');
    }

}
