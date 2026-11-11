<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'institution_name', 'education_level', 'major',
        'start_year', 'end_year', 'description', 'status',
    ];
}
