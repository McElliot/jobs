<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Application extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['opening_id', 'user_id'];

    protected $primaryKey = 'id';

    public function opening()
    {
        return $this->belongsTo(Opening::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Boot function to generate UUID when creating a new Application.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}
