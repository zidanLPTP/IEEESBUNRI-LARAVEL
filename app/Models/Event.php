<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'date', // Otomatis jadi Carbon instance
    ];

    protected static function booted()
    {
        static::deleting(function ($model) {
            if ($model->poster) {
                \App\Services\CloudinaryService::deleteImage($model->poster);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('poster') && $model->getOriginal('poster')) {
                \App\Services\CloudinaryService::deleteImage($model->getOriginal('poster'));
            }
        });
    }
}