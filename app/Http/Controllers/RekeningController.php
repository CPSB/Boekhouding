<?php

namespace App\Http\Controllers;

use App\Http\Requests\RekeningValidator;
use App\Repositories\RekeningenRepository;
use Illuminate\Http\{
    RedirectResponse, Request, Response
};
use Illuminate\View\View;

/**
 * Class RekeningController
 *
 * @package App\Http\Controllers
 */
class RekeningController extends Controller
{
    private $rekeningenRepository; /** RekeningenRepository $rekeningRepository */

    /**
     * RekeningController constructor.
     *
     * @param  RekeningenRepository $rekeningenRepository Abstraction layer between database and controller.
     * @return void
     */
    public function __construct(RekeningenRepository $rekeningenRepository)
    {
        $this->middleware(['role:boekhouding']);
        $this->rekeningenRepository = $rekeningenRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('rekeningen.index', ['rekeningen' => $this->rekeningenRepository->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('rekeningen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RekeningValidator $input Form validation class for the user input.
     * @return RedirectResponse
     */
    public function store(RekeningValidator $input): RedirectResponse
    {
        $input->merge(['author_id' => auth()->user()->id]);

        if ($this->rekeningenRepository->create($input->all())) { // Record created
            flash('De rekening is opgeslagen in het systeem.')->success();
        }

        return redirect()->route('rekeningen.index');
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
        $rekening = $this->rekeningenRepository->find($id) ?: abort(Response::HTTP_NOT_FOUND);
        return view('rekeningen.edit', compact('rekening'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RekeningValidator $input
     * @param  int $id
     * @return RedirectResponse
     */
    public function update(RekeningValidator $input, $id): RedirectResponse
    {
        $input->merge(['author_id' => auth()->user()->id]);
        $filter = ['_method', '_token'];

        if ($rekening = $this->rekeningenRepository->update($input->except($filter), $id))  {
            flash("De rekening {$rekening->rekening_naam} is aangepast.")->success();
        }

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
        $rekening = $this->rekeningenRepository->find($id) ?: abort(Response::HTTP_NOT_FOUND);

        if ($rekening->delete()) {
            flash("De rekening {$rekening->rekening_naam} is verwijderd uit het systeem")->success();
        }

        return redirect()->route('rekeningen.index');
    }
}
