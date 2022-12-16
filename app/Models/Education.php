<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'exam',
        'university',
        'board',
        'gpa',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
