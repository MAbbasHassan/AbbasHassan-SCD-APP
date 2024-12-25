<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table ='categories';
    protected $fillable=['name'];


// app/Models/Product.php

// app/Models/Category.php

public function products()
{
    return $this->hasMany(Product::class);  //product table
}
}

