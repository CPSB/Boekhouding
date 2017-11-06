<?php

namespace App\Http\Controllers;

use App\Repositories\RekeningenRepository;
use App\Repositories\TransactieRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class TransactieController
 *
 * @package App\Http\Controllers
 */
class TransactieController extends Controller
{
    private $transactieRepository; /** @var TransactieRepository $transactieRepository */
    private $rekeningenRepository; /** @var RekeningenRepository $rekeningenRepository */

    /**
     * TransactieController constructor.
     *
     * @param  TransactieRepository $transactieRepository Abstraction layer between database and controller.
     * @param  RekeningenRepository $rekeningenRepository Abstraction layer between database and controller
     * @return void
     */
    public function __construct(TransactieRepository $transactieRepository, RekeningenRepository $rekeningenRepository)
    {
        $this->middleware('auth');

        $this->transactieRepository = $transactieRepository;
        $this->rekeningenRepository = $rekeningenRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('transacties.index', [
            'transacties' => $this->transactieRepository->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('transacties.create', [
            'rekeningen' => $this->rekeningenRepository->all(['id', 'rekening_naam', 'rekening_nr'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
