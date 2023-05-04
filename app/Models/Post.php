<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = [
        "title",
        "image_url"
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // 取得数制限をかける方法；
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy("updated_at","DESC")->limit($limit_count)->get();
    }
    
    // ページネーションと取得する制限をかける方法；
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy("updated_at","DESC")->paginate($limit_count);
    }
}
