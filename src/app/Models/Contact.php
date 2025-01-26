<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeKeywordSearch($query, $keyword) {
        if (!empty($keyword)) {
        $query->where('name', 'like', '%' . $keyword . '%')
        ->orWhere('email', 'like', '%' . $keyword . '%');
        }
    }

    public function scopeGenderSearch($query, $gender) {
        if (!empty($gender)) {
        $query->where('gender'. $gender);
        }
    }

    public function scopeCategorySearch($query, $category) {
        if (!empty($category)) {
        $query->where('category_id', $category);
        }
    }

    public function scopeDateSearch($query, $date) {
        if (!empty($date)) {
        $query->where('created_at', 'like', '%' . $date . '%');
        }
    }
}
