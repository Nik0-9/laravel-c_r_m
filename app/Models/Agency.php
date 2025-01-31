<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Agency extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $fillable = [
        'name',
        'logo_path',
        'partitaIva',
    ];
    
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
