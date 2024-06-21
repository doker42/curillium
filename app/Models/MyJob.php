<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateRange',
        'companyName',
        'companyLink',
        'typeJob',
        'position',
        'library',
        'langs',
        'stack',
        'additions'
    ];

    protected $table = 'myjobs';

}
