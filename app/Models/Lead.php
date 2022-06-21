<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'email',
        'phone',
        'estimated_close',
        'description',
        'budget',
        'stage',
        'responsable_id',
        'client_id',
    ];

    protected $dates = ['estimated_close'];

    public function getStageFormattedAttribute($value) // stage_formatted
    {

        $stage = $this->attributes['stage'];
        $text = 'Etapa inicial';

        switch ($stage) {
            case 0:
                $text = 'Etapa inicial';
                break;
            case 1:
                $text = 'Em trâmite';
                break;
            case 2:
                $text = 'Negócio fechado';
                break;
            case 3:
                $text = 'Cancelados';
                break;
        }
        return $text;
    }

    public function getDescriptionFormattedAttribute() // description_formatted
    {
        $description = $this->getAttribute('description');
        $text = substr($description, 0, 160);
        $endText = strlen($description) >= 160 ? '...' : '';

        return "$text$endText";
    }

    public function getEstimatedCloseFormattedAttribute() // estimated_close_formatted
    {
        return $this->getAttribute('estimated_close')->format('d/m/Y \à\s H:m\h');
    }

    public function getBudgetFormattedAttribute() // budget_formatted
    {
        return number_format($this->getAttribute('budget'), 2, ',', '.');
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function expenses()
    {
        return $this->hasMany(LeadExpense::class);
    }

    public function getTotalExpensesFormattedAttribute() // total_expenses_formatted
    {
        $value = $this->expenses()->where('type', '=', 1)->sum('value');
        return number_format($value, 2, ',', '.');
    }

    public function getSumExpensesAttribute() // sum_expenses
    {
        $expenses = $this->expenses()->where('type', '=', 1)->sum('value');
        $total = $this->getAttribute('budget') - $expenses;

        if($total <= 0) {
            return 'R$ 0,00';
        }

        return number_format($total, 2, ',', '.');
    }
}
