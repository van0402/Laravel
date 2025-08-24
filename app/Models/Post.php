<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false; // Tắt tính năng tự động cập nhật timestamps
    use HasFactory;
    protected $fillable = [
        'title',
        'short_desc',
        'decs',
        'image',
     
    ];
    protected $table = 'posts'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; //

    public function category()
    {
        return $this->belongsTo(CategoryPost::class, 'post_category_id', 'id');
    }
}
