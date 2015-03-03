<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	 protected $fillable = array('isbn', 'bookname', 'state','user_id');

}
