<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upozila extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'district_id',
        'division_id',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
