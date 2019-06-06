<?php
namespace App\Modules\General\Users\Models;
use Illuminate\Database\Eloquent\Model;
use JWTSubject;
class Users extends Model implements JWTSubject
{
    protected $table    = "users";
    protected $fillable = ['id','name','email','email_verified_at','password','remember_token'];
    protected $visible = ['id','name','email','email_verified_at','remember_token'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims()
    {
        return [];
    }
}