<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Opening extends Model
{
    /** @use HasFactory<\Database\Factories\OpeningFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duties',
        'qualifications',
        'user_id',
        'location',
        'deadline',
        'job_sector',
        'job_type',
        'url',
        'email',
        'application_type',
        'min_salary',
        'max_salary',
        'salary_type',
        'category_id',
        'gender',
        'contact',
        'is_featured',
        'status',
        'logo',
        'cover',
    ];

    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // Because UUID is a string

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function tag(string $name)
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

        // Automatically set status to expired if deadline is passed
        static::saving(function ($job) {
            if ($job->deadline && now()->greaterThanOrEqualTo($job->deadline)) {
                $job->status = 'expired';
            }
        });
    }

}
