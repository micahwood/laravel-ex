<?php

namespace App\Http\Controllers;

use PHPImageWorkshop\ImageWorkshop;
use App\Models\Image;
use Input;
use Validator;
use Response;
use Redirect;

class ImagesController extends Controller {

    /**
     * Return images of the provided category.
     *
     * @param $category
     * @return Response
     */
    public function index()
    {
        $category = Input::get('category', 'current');
        $images = Image::firstOrFail();
        $images = unserialize($images->imageArr);
        $images = array_values(array_filter($images, function($image) use ($category) {
            return $image['category'] == $category;
        }));

        return Response::json($images);
    }

    /**
     * Store a newly created image in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), Image::$rules);

        if ($validator->passes()) {
            $newImage = [];
            $file = Input::file('artwork');
            $name = $file->getClientOriginalName();
            //resize main image
            $imgLayer = ImageWorkshop::initFromPath($file->getPathName());
            if ($imgLayer->getHeight() > Image::$mainHeight) {
                $imgLayer->resizeInPixel(null, Image::$mainHeight, true);
            }
            $imgLayer->save(Image::$storePath, $name, true, null, Image::$quality);

            //create thumbnail
            $imgLayer->resizeByNarrowSideInPixel(Image::$thumbWidth, true);
            $imgLayer->cropInPixel(Image::$thumbWidth, Image::$thumbHeight, 0, 0, 'MM');
            $imgLayer->save(Image::$thumbPath, $name, true, null, Image::$quality);

            $newImage['title'] = Input::get('title');
            $newImage['url'] = Image::$urlPath . $name;
            $newImage['thumbnail'] = Image::$urlPath . 'thumbs/' . $name;
            $newImage['category'] = Input::get('category');

            $image = Image::first();
            if (! $image) {
                $image = new Image();
                $images = [];
            } else {
                $images = unserialize($image->imageArr);
            }
                array_unshift($images, $newImage);
                $image->imageArr = serialize($images);
                $image->save();

            return Redirect::to('/dashboard')->with('message', 'Image Uploaded!');
        } else {
            return Redirect::to('/dashboard')
                ->with('error', 'The following errors occurred')
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Update the specified images in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $titles = Input::get('title');
        $urls = Input::get('url');
        $thumbnails = Input::get('thumbnail');
        $categories = Input::get('categories');
        $image = Image::first();
        $allImages = [];

        for ($i=0; $i < count($titles); $i++) {
            $newImage = [];
            $newImage['title'] = $titles[$i];
            $newImage['url'] = $urls[$i];
            $newImage['thumbnail'] = $thumbnails[$i];
            $newImage['category'] = $categories[$i];
            array_push($allImages, $newImage);
        }

        $image->imageArr = serialize($allImages);
        $image->save();
        return Redirect::to('/dashboard')->with('message', 'Image Order Updated!');
    }

}