<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedProject extends Model
{
    use HasFactory;
    protected $table = 'related_projects';
    protected $fillable = ['project_id', 'service_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function service()
    {
        return $this->belongsTo(Services::class);
    }

}
