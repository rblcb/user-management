<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 2014.09.26
 * Time: 06:56
 */

class PageController extends BaseController{

    public $data = array();
    public $restful = true;
    public $layout = 'inc.layout';

    public function __construct() {
        if(Auth::check()){
            $this->data["user"] = Auth::user();
        }
    }

    public function index($page = false){
        return View::make('home', $this->data);
    }
} 