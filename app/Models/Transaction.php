<?php

namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Transaction extends Model
    {
        use HasFactory;
        protected $fillable = ['cashbook_id', 'category_id', 'date', 'description', 'amount', 'type'];

        public function cashbook() {
            return $this->belongsTo(Cashbook::class);
        }

        public function category() {
            return $this->belongsTo(Category::class);
        }
    }
