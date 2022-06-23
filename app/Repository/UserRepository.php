<?php


namespace App\Repository;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{

    protected function model(): Model
    {
        return new User();
    }

    protected function relationships(): array
    {
        return [];
    }
}
