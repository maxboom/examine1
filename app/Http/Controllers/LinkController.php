<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(string $segment)
    {
        $link = Link::findBySegment($segment);

        return view('links.index', compact('link'));
    }

    public function delete(string $segment)
    {
        $link = Link::findBySegment($segment);

        $link->delete();

        return redirect(route('loginPage'));
    }

    public function create()
    {
        $link = Link::generateLink(auth()->user());

        return view('links.welcome', ['segment' => $link->segment]);
    }
}
