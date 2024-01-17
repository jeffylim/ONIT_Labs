<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable;
use \Illuminate\Contracts\Auth\UserProvider;
use \Illuminate\Support\Facades\DB;

class PDOUserProvider implements UserProvider{
    public function con(){
        return DB::connection()->getPdo();
    }
    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier){
        /*$row=$this->con()->query("SELECT * FROM users WHERE id=".$identifier)->fetch();
        if($row)
            return $this->getGenericUser($row);*/
        return User::find($identifier);
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials){
        $row=$this->con()->query("SELECT * FROM users WHERE (login='".$credentials['login']."' OR email='".$credentials['login']."' OR phone='".$credentials['login']."') AND password='".$credentials['password']."'")->fetch();
        if($row)
            //return $this->getGenericUser($row);
            return User::find($row['id']);
    }

    protected function getGenericUser($user){
        if(! is_null($user)){
            return new GenericUser((array) $user);
        }
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials){
        $row=$this->con()->query("SELECT * FROM users WHERE (login='".$credentials['login']."' OR email='".$credentials['login']."' OR phone='".$credentials['login']."') AND password='".$credentials['password']."'")->fetch();
        return $row ? true : false;
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token){}

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token){}

}
