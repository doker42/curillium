<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


/**
 * @property string original_filename
 * @property string filename
 * @property boolean status
 */
class Letter extends Model
{
    protected $fillable = [
        'original_filename',
        'filename',
        'status'
    ];

    public function url(): string
    {
        return asset('storage/' . $this->filename);
    }
}
