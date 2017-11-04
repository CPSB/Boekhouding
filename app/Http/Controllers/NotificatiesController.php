<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class NotificatiesController
 *
 * @package App\Http\Controllers
 */
class NotificatiesController extends Controller
{
    /**
     * NotificatiesController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // TODO
    }

    public function markOne()
    {
        // TODO
    }

    public function markAll()
    {
        // TODO
    }
}
