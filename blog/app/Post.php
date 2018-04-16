<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
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

   
    public function getCreatedDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
    public function getUserCreatedDateAttribute()
    {
        return \Carbon\Carbon::parse($this->user->created_at)->format('l jS \\of F Y h:i:s A');
    }
    public function getNumofpostsAttribute($id){
        //$this->find
        // return $this->created_at->formate();
    }
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
}
