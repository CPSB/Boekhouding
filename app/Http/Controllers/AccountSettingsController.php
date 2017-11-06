<?php

namespace App\Http\Controllers;

use App\Http\Requests\{AccountInfoValidator, AccountSecValidator};
use Illuminate\Http\{RedirectResponse, Request};
use App\Repositories\UserRepository;

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

    public function index()
    {
        //
    }

    public function updateInfo(AccountSecValidator $input): RedirectResponse
    {
        if ($this->usersRepository->update($input->except('_token'), auth()->user()->id)) {
            flash()->success();
        }

        return redirect()->route('account.settings');
    }

    public function updateSecurity(AccountInfoValidator $input): RedirectResponse
    {
        if ($this->usersRepository->update($input->except('_token'), auth()->user()->id)) {
            flash()->success();
        }

        return redirect()->route('account.settings');
    }
}
