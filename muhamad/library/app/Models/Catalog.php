<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    // Catalog has Many Books
    public function books()
    {
        return $this->hasMany(Book::class, 'catalog_id');
    }
}