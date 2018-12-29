<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'description',
        'sum'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
