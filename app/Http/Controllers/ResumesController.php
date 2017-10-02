<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Input;
use Response;
use Redirect;

class ResumesController extends Controller {

    /**
     * Return resume markup.
     *
     * @param $category
     * @return Response
     */
    public function index()
    {
        return Response::json(Resume::first());
    }

    /**
     * Update the resume in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $resume = Resume::first();
        $resume->body = Input::get('body');
        $resume->save();

        return Redirect::back()->with('message', 'Resume Updated!');
    }

}