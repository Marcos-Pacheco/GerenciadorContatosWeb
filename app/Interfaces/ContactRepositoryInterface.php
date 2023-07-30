<?php

namespace App\Interfaces;

use App\Models\Contact;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

interface ContactRepositoryInterface
{
    public static function findById(int $id): ? Contact;

    public static function findAll(): Collection;
}
