<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function expenseReport() {
        return $this->belongsTo(ExpenseReport::class);
    }
}
