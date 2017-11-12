<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactieValidator;
use App\Repositories\RekeningenRepository;
use App\Repositories\TransactieRepository;
use Carbon\Carbon;
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
     * @param  TransactieValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TransactieValidator $input): RedirectResponse
    {
        $opslagFactuur = $input->file('factuur')->storeAs(
        'facturen/' . date('Y') . '/' . date('m'),
        'factuur-' . $input->naam . '.' . $input->file('factuur')->getClientOriginalExtension()
        );

        $input->merge([
            'author_id' => $input->user()->id,
            'factuur_path' => $opslagFactuur,
            'transactie_datum' => (new Carbon($input->transactie_datum))->format('Y-m-d H:i:s')
        ]);

        if ($gegevens = $this->transactieRepository->create($input->except(['factuur', '_token', 'rekening']))) {
            $this->rekeningenRepository->find($input->rekening)->transactie()->attach($gegevens->id);
            flash('De transactie is opgeslagen in het systeem.')->success();
        }

        return redirect()->route('transacties.index');
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
     * @param  TransactieValidator $input
     * @param  int                $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactieValidator $input, $id)
    {
        dd($input->all());
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
