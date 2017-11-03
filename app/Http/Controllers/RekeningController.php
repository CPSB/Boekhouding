<?php

namespace App\Http\Controllers;

use App\Repositories\RekeningenRepository;
use Illuminate\Http\{RedirectResponse, Response};
use Illuminate\View\View;

/**
 * Class RekeningController
 *
 * @package App\Http\Controllers
 */
class RekeningController extends Controller
{
    private $rekeningRepository; /** RekeningRepository $rekeningRepository */

    /**
     * RekeningController constructor.
     *
     * @param  RekeningenRepository $rekeningRepository Abstraction layer between database and controller.
     * @return void
     */
    public function __construct(RekeningenRepository $rekeningRepository)
    {
        $this->middleware('auth');
        $this->rekeningRepository = $rekeningRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('rekeningen.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        return view('rekeningen.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        return view('rekeningen.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        return view('rekeningen.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        return redirect()->back(Response::HTTP_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        //
    }
}
