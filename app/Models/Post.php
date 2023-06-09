<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory;

    use Sluggable;


    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    protected $fillable =
        [
            'title', 'content', 'date', 'description'
//            'category_id', 'status', 'is_featured'
        ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany
        (
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
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
//        dd($post);
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
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }

        $this->removeImage();
        $filename = Str::random(10) . '.' . $image->extension(); // генерирует имя файла
        $image->storeAs('uploads', $filename); // относительно папки public
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->image;

    }

    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids == null) {
            return;
        }

        $this->tags()->sync($ids); //синхронизация тегов
    }


    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save(); // в черновик
    }

    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save(); // публичный статус
    }

    public function toggleStatus($value) //переключатель для статей
    {
        if ($value == null) {
            return $this->setDraft();
        }

        return $this->setPublic();
    }


    public function setFeatured() // рекомендованные
    {
        $this->is_featured = true;
        $this->save(); //
    }

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value) //переключатель для статей
    {
        if ($value == null) {
            return $this->setStandart();
        }
        return $this->setFeatured();
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        return $date;
    }

    public function getCategoryTitle()
    {
//        if ($this->category != null)
//        {
//            return $this->category->title;
//        }
//        return 'Нет категории';

        return ($this->category != null)
            ? $this->category->title
            : 'Нет категории';

    }

    public function getTagsTitles()
    {
        return (!$this->tags->isEmpty())
            ? implode(', ', $this->tags->pluck('title')->all())
            : 'Нет тегов';
    }

    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }

    public function hasPrevious()
    {
        return self::query()->where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postID = $this->hasPrevious();
        return self::find($postID);
    }

    public function hasNext()
    {
        return self::query()->where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postId = $this->hasNext();
        return self::find($postId);
    }

    public function related()
    {
        return self::all()->except($this->id);
    }

    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }

    public static function getPopularPost()
    {

        return self::orderBy('views', 'desc')
            ->take(3)
            ->get();
    }

    public static function getFeaturedPost()
    {
        return self::where('is_featured', 1)
            ->take(3)
            ->get();
    }

    public static function getRecentPost()
    {
        return self::orderBy('date', 'desc')
            ->take(4)
            ->get();
    }
}

