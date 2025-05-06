<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Candidate extends Model
{
    /** @use HasFactory<\Database\Factories\CandidateFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'sector',
        'country',
        'province',
        'city',
        'qualification',
        'gender',
        'marital_status',
        'age_group',
        'dob',
        'cv',
    ];

    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // Because UUID is a string

    protected $dates = ['dob'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'candidate_category');
    }

    protected static function boot()
    {
        parent::boot();

        // Automatically assign UUID on creating
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
