<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hobby extends Model
{
    protected $fillable = ['hobby_name', 'category', 'description', 'photo'];

    public function getPhotoUrlAttribute(): ?string
    {
        if ($this->photo && Storage::disk('public')->exists($this->photo)) {
            return Storage::url($this->photo);
        }
        return null;
    }

    protected static function booted(): void
    {
        static::deleting(function (Hobby $hobby) {
            if ($hobby->photo && Storage::disk('public')->exists($hobby->photo)) {
                Storage::disk('public')->delete($hobby->photo);
            }
        });
    }
}
