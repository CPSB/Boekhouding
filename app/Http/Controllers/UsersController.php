<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidator;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class UsersController
 *
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    private $userRepository; /** @var UserRepository $userRepository */

    /**
     * UsersController constructor.
     *
     * @param  UserRepository $userRepository Abstraction layer between database and controller.
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware(['role:boekhouding']);
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => $this->userRepository->entity()->whereHas('roles', function ($query) {
                $query->where('name', 'boekhouding');
            })->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserValidator $input
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidator $input)
    {
        if ($user = $this->userRepository->create($input->except('_token'))->assignRole('boekhouding')) {
            flash("{$user->name} is toegevoegd als login in de boekhouding.")->success();
        }

        return redirect()->route('users.index');
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $user = $this->userRepository->find($id) ?: abort(Response::HTTP_NOT_FOUND);

        if ($this->userRepository->delete($user->id)) {
            flash("De gebruiker {$user->name} is verwijderd uit de boekhouding.")->success();
        }

        return redirect()->route('users.index');
    }
}
