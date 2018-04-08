<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Eloquent implements Authenticatable {
  use Notifiable, AuthenticableTrait;
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
//  protected $connection = 'mongodb';
//    protected $collection = 'keywords';
  protected $fillable = [
    'name', 'email', 'password',
  ];
  protected $dates = ['deleted_at'];
  
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];
  
  public function books(){
    return $this->hasMany('Book');
  }
}
