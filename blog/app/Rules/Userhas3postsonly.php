<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;
class Userhas3postsonly implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //dd($value);
        $posts = DB::table('posts')
                ->where('user_id', '=', $value)
                ->get();
               // dd(count($posts));
        if(count($posts)<3) return true;        
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You cannot create post , You create 3 posts only ';
    }
}
