<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 2014.09.27
 * Time: 13:43
 */

class Role extends Eloquent{
    /**
     * Set timestamps off
     */
    public $timestamps = false;

    /**
     * Get users with a certain role
     */
    public function users()
    {
        return $this->belongsToMany('User');
    }

    public  function groups(){
        return $this->belongsToMany('Group');
    }
} 