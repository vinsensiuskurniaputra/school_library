<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;


class Book extends Model
{
    use HasFactory;

    public const STATUSES = [
        'Available' => 'Tersedia',
        'Unavailable' => 'Tidak tersedia',
    ];

    protected $guarded = ['id'];

    public function scopeFilter(Builder $query, array $filters){
        $query->when($filters['category'] ?? false, function ($query, $category){
            return $query->where('category_id', $category);
        });
        $query->when($filters['search'] ?? false, function ($query, $search){
            return $query->where('judul', 'like', '%'.$search.'%')
                        ->orWhere('penulis', 'like', '%'.$search.'%')
                        ->orWhere('penerbit', 'like', '%'.$search.'%')
                        ->orWhere('tanggal_terbit', 'like', '%'.$search.'%');
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
