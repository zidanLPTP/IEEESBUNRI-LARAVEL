<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Officer extends Authenticatable
{
    use Notifiable;

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