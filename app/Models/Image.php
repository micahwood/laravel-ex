<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
	protected $fillable = [];

  public $timestamps = false;

  public static $storePath = 'images';
  public static $thumbPath = 'images/thumbs';

  public static $urlPath = '/images/';

  public static $mainHeight = 1520; //px

  public static $thumbWidth = 200; //px
  public static $thumbHeight = 200; //px

  public static $quality = 95; //%

  public static $rules = array(
    'artwork' => 'required|image'
  );
}