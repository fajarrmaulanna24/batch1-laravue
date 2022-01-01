<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

//cara ke 2 create data
protected $fillable = ['name', 'phone_number', 'email', 'address'];

	public function books() {
		return $this->hasMany(Book::class, 'publisher_id');
	}
}
