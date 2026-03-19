<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $guarded = ['id'];

    // Biarkan Laravel tahu bahwa 'date' adalah objek tanggal
    protected $casts = [
        'date' => 'date',
        'is_published' => 'boolean',
    ];

    protected static function booted()
    {
        static::deleting(function ($model) {
            if ($model->image) {
                \App\Services\CloudinaryService::deleteImage($model->image);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('image') && $model->getOriginal('image')) {
                \App\Services\CloudinaryService::deleteImage($model->getOriginal('image'));
            }
        });
    }

    // Relasi ke User (Penulis)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper untuk mengambil author (pakai author_name jika ada, jika tidak pakai nama user)
    public function getFinalAuthorAttribute()
    {
        return $this->author_name ?? ($this->user->name ?? 'Admin');
    }
}