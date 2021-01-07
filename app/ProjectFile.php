<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{

    protected $table = 'project_files';

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
