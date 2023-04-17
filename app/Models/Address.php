<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['house', 'street', 'island_id'];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function island(){
        return $this->belongsTo(Island::class);
    }

}
