<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'product_categories';
    protected $primarykey = 'id';
    protected $guarded = [];
    public function product()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
}