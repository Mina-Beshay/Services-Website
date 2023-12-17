<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Services extends Model
{
    use HasFactory;
    protected $table='services';
    protected $primaryKey='id';

    protected $fillable = [
        'id',
        'name',
        'details',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_service', 'project_id', 'service_id');
    }

}

