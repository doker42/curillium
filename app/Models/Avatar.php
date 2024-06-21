<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = [
        'filename',
        'original_name',
        'status'
    ];


    public function url(): string
    {
        return asset('storage/' . $this->filename);
    }
}
