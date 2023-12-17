<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table='projects';
    protected $primaryKey='id';
    protected $fillable = [
        'name',
        'description',
        'image',
        'gallery',

    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function services()
    {
        return $this->belongsToMany(Services::class, 'project_service', 'project_id', 'service_id');
    }
    public function relatedProjects()
    {
        return $this->hasMany(RelatedProject::class, 'related_projects', 'project_id', 'service_id');
    }

}
