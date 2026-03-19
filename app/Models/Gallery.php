<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = ['id'];

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
}
