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

    public static function update(Contact $contact) : bool
    {
        return $contact->save();
    }

    public static function delete(Contact $contact) : bool
    {
        return $contact->delete();
    }

    public static function create(Contact $contact) : bool
    {
        return $contact->save();
    }

}