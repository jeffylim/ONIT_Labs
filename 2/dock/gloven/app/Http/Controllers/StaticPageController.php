<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaticPage;
class StaticPageController extends Controller
{
    public function show($path){
        $page = StaticPage::where('path', '=', $path) -> firstOrFail();
        return view($page -> view, ['title' => $page -> title, 'pageName'=>$page->path, 'content' => $page -> content]);
    }
}
