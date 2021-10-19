<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function users() {
        return $this->hasMany(User::class);
    }

    public function ceo() {
        return $this->hasOne(User::class, 'id', 'ceo_id');
    }

    public function offers() {
        return $this->hasMany(Offer::class, 'company_id', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'code_ape',
        'ape_verified_at',
        'ceo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
