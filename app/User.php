<?php

namespace App;

use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fname', 'lname', 'birthday', 'phone_number', 'fax',  'email',
    'description', 'password', 'active', 'privilege'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static function getPasswordValidator($request)
    {
      //Input Rules for processing the HTML Form data. Will return errors
      //if the rules are not satisfied.
      $rules = [
          'current_password'      => 'required',
          'password'              => 'required',
          'password_confirm'      => 'required|same:password'
      ];

      return Validator::make($request->all(), $rules);
    }

    public static function getEmailValidator($request)
    {
      //Input Rules for processing the HTML Form data. Will return errors
      //if the rules are not satisfied.
      $rules = [
          'email'             => 'required',
          'email_confirmation'     => 'required|same:email',
          'current_password'          => 'required'
      ];

      return Validator::make($request->all(), $rules);
    }

}
