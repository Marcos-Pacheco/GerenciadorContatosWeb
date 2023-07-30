<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

class ContactRepository implements ContactRepositoryInterface
{
    public static function findAll() : Collection
    {
        return Contact::get();
    }

    public static function findById(int $id): ? Contact
    {
        return Contact::where('id',$id)->first();
    }

}