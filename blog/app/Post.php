<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use Sluggable;
    use SoftDeletes;
    use \Spatie\Tags\HasTags;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'slug',
        'image'
    ];
    
    protected $dates = ['deleted_at'];
    public function user()
    {
        //User::class == 'App\User'
        return $this->belongsTo(User::class);
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getCreatedDateAttribute(){
        // return $this->created_at->formate();
    }
    public function getNumofpostsAttribute($id){
        //$this->find
        // return $this->created_at->formate();
    }
}
