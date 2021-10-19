<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'brand_id',
        'company_id',
        'model',
        'reference',
        'vue'
    ];
}
