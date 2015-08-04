<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected $fillable = ['email', 'subject', 'contact', 'message'];

    protected $table = 'messages';


}
