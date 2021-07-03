<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



/**
 * @method static paginate()
 * Thêm cái này vào để phân trang
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];


}
