<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function uploadAvatar($image)
    {
        $filename = $image->getClientOriginalName();

        (new self())->deleteOldImage();

        $image->storeAs('images', $filename, 'public');
        
        // dd($filename);
        auth()->user()->update(['avatar' => $filename]);
    }


    
    protected function deleteOldImage()
    {
        if ($this->avatar) {
            
            Storage::delete('/public/images/' . $this->avatar);
        }
    }

    // this is a mutator, because we are mutating the password that is coming in
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    // this is an Accessor, it modifies but does not change what is in the database.
    public function getNameAttribute($name)
    {
        return  "My name is " . ucfirst($name);
    }
}
