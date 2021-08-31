<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use Livewire\Component;

class LoginHistory extends Component
{
    public bool $showingLoginHistory = false;

    public function getLoginsProperty()
    {
        return collect(DB::table('authentication_log')
            ->where('authenticatable_id', Auth::user()->getAuthIdentifier())
            ->orderBy('id', 'desc')
            ->get()
        )->map(function ($login) {
            return (object)[
                'agent' => $this->createAgent($login),
                'ip_address' => $login->ip_address,
                'login_at' => $login->login_at,
                'is_logged_out' => $login->logout_at != null,
            ];
        });
    }

    protected function createAgent($login)
    {
        return tap(new Agent, function ($agent) use ($login) {
            $agent->setUserAgent($login->user_agent);
        });
    }

    public function render()
    {
        return view('profile.login-history');
    }
}
