<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ExperiencePhoto extends Model
{
    protected $fillable = ['experience_id', 'photo', 'caption'];

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && Storage::disk('public')->exists($this->photo)) {
            return Storage::url($this->photo);
        }
        return asset('assets/images/default-photo.png');
    }

    protected static function booted(): void
    {
        static::deleting(function (ExperiencePhoto $photo) {
            if ($photo->photo && Storage::disk('public')->exists($photo->photo)) {
                Storage::disk('public')->delete($photo->photo);
            }
        });
    }
}
