<?php

class ImagesTableSeeder extends Seeder {

	public function run()
	{
    DB::table('images')->delete();

    $i = new Image();
		$images = array();

    $urls = array(
      "images/DSC_1059.jpg",
      "images/DSC_1077.jpg",
      "images/DSC_1087.jpg",
      "images/DSC_1089.jpg",
      "images/DSC_1090.jpg",
      "images/DSC_1100.jpg",
      "images/HardyI.jpg",
      "images/Hardy.jpg",
      "images/NotSoFarAway.jpg",
      "images/beforewecame.jpg",
      "images/chutethepool.jpg",
      "images/ifit'sfound.jpg",
      "images/it_has_a_growing_voice.jpg",
      "images/piecebypiece.jpg",
      "images/surprisecorner II.jpg",
      "images/surprisecorner.jpg",
      "images/tothisplace.jpg",
      "images/white_river.jpg",
      "images/worldupturned.img001.jpg",
      "images/worldupturned.img002.jpg",
      "images/worldupturned.img003.jpg",
      "images/worldupturned.img004.jpg",
      "images/worldupturned.img005.jpg",
      "images/worldupturned.img006.jpg",
      "images/worldupturned.img007.jpg",
      "images/worldupturned.img008.jpg",
      "images/worldupturned.img009.jpg",
      "images/worldupturned.img010.jpg",
      "images/worldupturned.img011.jpg"
    );

    foreach ($urls as $url) {
      $image = array();
      $image['title'] = '';
      $image['url'] = $url;

      $name = substr($url, strpos($url, '/'));
      $thumbnail = 'images/thumbs' . $name;

      $image['thumbnail'] = $thumbnail;

      array_push($images, $image);
    }
    $i->imageArr = serialize($images);
    $i->save();
	}

}