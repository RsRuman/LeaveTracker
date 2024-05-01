<?php

namespace App\Http\Controllers\Auth;

use AllowDynamicProperties;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Interfaces\AuthenticationInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;

#[AllowDynamicProperties]
class AuthenticationController extends Controller
{
    public function __construct(AuthenticationInterface $authenticationRepository)
    {
        $this->authenticationRepository = $authenticationRepository;
    }

    /**
     * Employee registration page
     * @return View
     */
    public function registrationForm(): View
    {
        return view('auth.registration');
    }

    /**
     * Register a new employee
     * @param SignUpRequest $request
     * @return RedirectResponse
     */
    public function registration(SignUpRequest $request): RedirectResponse
    {
        $data = $request->only(['name', 'email', 'password']);

        $user = $this->authenticationRepository->register($data);

        if (!$user) {
            return redirect()->back()->with('error', 'Registration failed.')->setStatusCode(HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        return redirect()->route('login')->with('success', 'Registration successes.')->setStatusCode(HttpResponse::HTTP_CREATED);
    }

    /**
     * User login page
     * @return View
     */
    public function loginForm(): View
    {
        return view('auth.login');
    }

    /**
     * User login
     * @param SignInRequest $request
     * @return RedirectResponse
     */
    public function login(SignInRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if ($this->authenticationRepository->login($credentials)) {
            if (Auth::user()->type === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('employee.dashboard')->with('success', 'Login successful.')->setStatusCode(HttpResponse::HTTP_OK);
        }

        return redirect()->back()->with('error', 'Invalid credentials.')->setStatusCode(HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Logout a user
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        $this->authenticationRepository->logout();

        return redirect()->route('login')->with('success', 'Logout successful.')->setStatusCode(HttpResponse::HTTP_OK);
    }
}
