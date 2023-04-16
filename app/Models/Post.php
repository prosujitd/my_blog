<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'category_id',
        'user_id',
        'status',

        'tags'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id','categories');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id','users');
    }



    protected static function boot()
    {
        parent::boot();

        static::created(function ($post) {
//            dd($post);
            $post->slug = $post->createSlug($post->title);
            $post->save();
        });
    }

    private function createSlug($title){
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
