<?php

namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Cashbook extends Model
    {
        use HasFactory;
        protected $fillable = ['name', 'description', 'starting_balance'];

        public function categories() {
            return $this->hasMany(Category::class);
        }

        public function transactions() {
            return $this->hasMany(Transaction::class);
        }
    }
