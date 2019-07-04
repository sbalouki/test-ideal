<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Token;
use App\Square;

class BoardController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return View
     */
    public function index()
    {
        return view('/board');
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show()
    {
        $board = Board::first();
        return view('board', ['board' => $board]);
    }
}
