<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageResource;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PageResource::collection(Page::all());
    }

    public function showWeb(Page $the_page)
    {
        return view('main.pages.show', ['the_page' => $the_page]);
    }
}
