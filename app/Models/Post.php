<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory;

    use Sluggable;


    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    protected $fillable = ['title', 'content', 'user_id'];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function author()
    {
        return $this->hasOne(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,
            'post_tags',
            'post_id',
            'tag_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ]; //привет - privet
            // привет - privet-1
    }

    public static function add($fields)
    {
        $post = new static();
        $post->fill($fields);
        $post->user_id = 1;
        $post->save();
        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        Storage::delete('uploads/' . $this->image);
        $this->delete();
    }

    public function   uploadImage($image)
    {
        if ($image == null){ return;}
        Storage::delete('uploads/' . $this->image);
        $filename = Str::random(10). '.'. $image->extension(); // генерирует имя файла
        $image->saveAs('uploads', $filename); // относительно папки public
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null)
        {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->image;

    }

    public function  setCategory($id)
    {
        if ($id == null) {return;}
        $category = Category::find($id);
        $this->category()->save($category);
//        $this->category_id = $id;
//        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids == null){return;}

        $this->tags()->sync($ids); //синхронизация тегов
    }


    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save(); // в черновик
    }

    public  function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save(); // публичный статус
    }

    public function toggleStatus($value) //переключатель для статей
    {
        if ($value == null)
        {
            return $this->setDraft();
        }

        return $this->setPublic();
    }


    public function setFeatured() // рекомендованные
    {
        $this->is_featured = 0;
        $this->save(); //
    }

    public  function setStandart()
    {
        $this->status = 1;
        $this->save();
    }

    public function toggleFeatured($value) //переключатель для статей
    {
        if ($value == null)
        {
            return $this->setStandart();
        }

        return $this->setFeatured();
    }


}

