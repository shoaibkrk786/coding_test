<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'id', 'project_name', 'project_type','service','comment','terms',
    ];
    public function user(){

        return $this->belongsTo('App\User');
    }
}
