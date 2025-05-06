<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'company_name',
        'password',
        'username',
        'role',
        'status',
    ];

    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // Because UUID is a string

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn(string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function jobs()
    {
        return $this->hasMany(Opening::class);
    }

    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function current_study()
    {
        return $this->hasMany(CurrentStudy::class);
    }

    public function professional_qualification()
    {
        return $this->hasMany(ProfessionalQualification::class);
    }

    public function membership()
    {
        return $this->hasMany(Membership::class);
    }

    public function resume()
    {
        return $this->hasMany(Resume::class);
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
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
