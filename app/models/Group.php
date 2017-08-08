<?php

class Group extends \Eloquent {
    /**
     * Set timestamps off
     */
    public $timestamps = false;

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];


    public function users(){
        return $this->belongsToMany('User');
    }

}