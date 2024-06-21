<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'description'
    ];

    protected $table = 'settings';


    public static function defaultContacts(): array
    {
        return [
            'logo'      => config('contacts.logo'),
            'git'       => config('contacts.git'),
            'linkedin'  => config('contacts.linkedin'),
            'location'  => config('contacts.location'),
            'skype'     => config('contacts.skype'),
            'phone'     => config('contacts.phone'),
            'domain'    => config('contacts.domain'),
        ];
    }


    public static function contacts(): array
    {
        $all = self::all();

        $res = [];

        foreach ($all as $el) {
            $res[$el->name] = $el->value;
        }

        return $res;
    }


    public static function getLinks(): array
    {
        $defaultContacts = self::defaultContacts();
        $contacts = self::contacts();

        $res = [];

        foreach ($defaultContacts as $key => $value) {

            if (isset($contacts[$key])) {
                $res[$key] = $contacts[$key];
            }
            else {
                $res[$key] = $value;
            }
        }

        return $res;
    }

}
