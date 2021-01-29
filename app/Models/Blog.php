<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Tag;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'desc', 'content', 'img', 'category_id'];

    public function cat () {
        return $this->belongsTo(Category::class);
    }

     public function tags () {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag ($id) {
        return in_array($id, $this->tags->pluck('id')->toArray());
    }
}
