<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'duration_days',
        'price',
        'specifications',
    ];

    /**
     * Tự động cast dữ liệu JSON về Array để dễ xử lý trong PHP
     */
    protected $casts = [
        'duration_days' => 'integer',
        'price' => 'integer',
        'specifications' => 'array', // Cast JSON sang Array
    ];

    /**
     * Quan hệ: Một gói cước có thể được áp dụng cho nhiều SIM
     */
    public function sims()
    {
        return $this->hasMany(Sim::class, 'package_id');
    }

    /**
     * Scope: Lọc gói cước theo giá (Ví dụ: dưới 100k)
     */
    public function scopeCheaperThan($query, $amount)
    {
        return $query->where('price', '<=', $amount);
    }

    /**
     * Scope: Sắp xếp theo giá tăng dần
     */
    public function scopeOrderByPrice($query, $direction = 'asc')
    {
        return $query->orderBy('price', $direction);
    }
}
