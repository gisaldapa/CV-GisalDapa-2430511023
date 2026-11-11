<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PersonalInfo extends Model
{
    protected $table = 'personal_infos';

    protected $fillable = [
        'full_name', 'birth_place', 'birth_date', 'gender',
        'profession', 'address', 'phone', 'email',
        'description', 'profile_photo',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function getProfilePhotoUrlAttribute(): string
    {
        if ($this->profile_photo && Storage::disk('public')->exists($this->profile_photo)) {
            return Storage::url($this->profile_photo);
        }
        return asset('assets/images/default-avatar.png');
    }
}
