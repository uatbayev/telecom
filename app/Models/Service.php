<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'servicetype_id', 'price'
    ];
    public function servicetype(){
        return $this->belongsTo(Servicetype::class);
    }
}
