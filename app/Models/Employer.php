<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_address',
        'company_email',
        'company_telephone',
        'company_website',
        'about_company',
        'document1',
        'document2',
        'document3',
        'contact_person',
        'contact_person_phone_number',
        'contact_email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
