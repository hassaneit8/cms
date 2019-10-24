<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'published_at',
        'category_id',
        'user_id',

    ];
    use SoftDeletes;

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagID)
    {
        return in_array($tagID, $this->tags->pluck('id')->toArray());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
//<select name="category" id="category" class="form-control">
//@foreach($categories as $category)
//                            <option value="{{ $category->id }}"
//                            @if(isset($post))
//    @if($category->id==$post->category_id)
//    selected
//                                  @endif
//                                  @endif
//                            ></option>
//
//@endforeach
