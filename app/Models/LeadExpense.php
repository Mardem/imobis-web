<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'type',
        'value',
        'lead_id',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function getValueFormattedAttribute() // value_formatted
    {
        return number_format($this->getAttribute('value'), 2, ',', '.');
    }

    public function getTypeFormattedAttribute() // type_formatted
    {
        if($this->getAttribute('type') == 0) {
            $text = 'Saída';
        } else {
            $text = 'Entrada';
        }
        return $text;
    }
}
