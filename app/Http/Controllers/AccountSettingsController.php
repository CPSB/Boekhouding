<?php

namespace App\Http\Controllers;

use App\Http\Requests\{AccountInfoValidator, AccountSecValidator};
use Illuminate\Http\{RedirectResponse, Request};
use App\Repositories\UserRepository;
use Illuminate\View\View;

/**
 * Class AccountSettingsController
 *
 * @package App\Http\Controllers
 */
class AccountSettingsController extends Controller
{
    private $usersRepository; /** @var UserRepository $userRepository */

    /**
     * AccountSettingsController constructor.
     *
     * @param  UserRepository $userRepository The abstraction layer between database and controller.
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware(['role:boekhouding']);
        $this->usersRepository = $userRepository;
    }

    /**
     * Get the user settings views.
     *
     * @return View
     */
    public function index(): View
    {
        return view('account-settings.index', [
            'user' => $this->usersRepository->find(auth()->user()->id, ['name', 'email'])
        ]);
    }

    /**
     * Pas de account informatie aan.
     *
     * @param  AccountInfoValidator $input De validatie instantie voor gegeven invoer.
     * @return RedirectResponse
     */
    public function updateInfo(AccountInfoValidator $input): RedirectResponse
    {
        if ($this->usersRepository->update($input->except('_token'), auth()->user()->id)) {
            flash('Uw account informatie is aangepast.')->success();
        }

        return redirect()->route('account.settings');
    }

    /**
     * Pas de account beveiliging aan.
     *
     * @param  AccountSecValidator $input De validatie instantie voor gegeven invoer.
     * @return RedirectResponse
     */
    public function updateSecurity(AccountSecValidator $input): RedirectResponse
    {
        if ($this->usersRepository->update(['password' => bcrypt($input->password)], auth()->user()->id)) {
            flash('Uw account beveiliging is aangepast.')->success();
        }

        return redirect()->route('account.settings');
    }
}
