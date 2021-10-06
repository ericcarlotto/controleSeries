<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Season extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getEpisodesWatched(): Collection
    {
        return $this->episodes->filter(function (Episode $episode) {
            return $episode->watched;
        });
    }
}
