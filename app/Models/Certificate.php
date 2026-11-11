<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'certificate_name', 'issuer', 'issue_date',
        'certificate_number', 'description', 'certificate_url',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    public function photos()
    {
        return $this->hasMany(CertificatePhoto::class);
    }
}
