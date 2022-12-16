<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function upozilas()
    {
        return $this->hasMany(Upozila::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
