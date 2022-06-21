<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'colab_id'];

    public function colab()
    {
        return $this->belongsTo(User::class, 'colab_id');
    }

    public function details()
    {
        return $this->hasMany(ClientDetail::class);
    }
}
