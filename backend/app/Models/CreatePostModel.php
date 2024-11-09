<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class CreatePostModel extends AppModel {
    protected $table      = 't_create_posts';
	protected $primaryKey = 'post_id';
}