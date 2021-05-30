<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Registrar;
use App\Models\TopLevelDomain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DomainController extends Controller
{
    public function index(): View
    {
        $domains = Auth::user()->domains;

        return view('domains.index', ['domains' => $domains]);
    }

    public function create(): Response
    {
        $tlds = TopLevelDomain::all(['id', 'name']);
        $registrars = Registrar::all(['id', 'name']);

        return view('domains.create', [
            'tlds' => $tlds,
            'registrars' => $registrars
        ]);
    }

    public function store(Request $request): Response
    {
        $validated = $request->validate([
            'name' => ['required'],
            'top_level_domain_id' => ['required'],
            'registrar_id' => ['required'],
            'registered_date' => ['required'],
            'yearly_cost' => ['required'],
        ]);

        Domain::create([
            'user_id' => Auth::id(),
            'name' => $request['name'],
            'top_level_domain_id' => $request['top_level_domain_id'],
            'registrar_id' => $request['registrar_id'],
            'registered_date' => $request['registered_date'],
            'yearly_cost' => $request['yearly_cost'] * 100,
            'will_autorenew' => $request->has('will_autorenew'),
            'has_ssl_certificate' => $request->has('has_ssl_certificate'),
        ]);

        return redirect()->route('domains.index')->with('message', 'The domain has been successfully added!');
    }

    public function show(Domain $domain): Response
    {
        return view('domains.show', ['domain' => $domain]);
    }

    public function edit(Domain $domain): Response
    {
        $tlds = TopLevelDomain::all(['id', 'name']);
        $registrars = Registrar::all(['id', 'name']);

        return view('domains.edit', [
            'tlds' => $tlds,
            'registrars' => $registrars,
            'domain' => $domain
        ]);
    }

    public function update(Request $request, Domain $domain): Response
    {
        $validated = $request->validate([
            'name' => ['required'],
            'top_level_domain_id' => ['required'],
            'registrar_id' => ['required'],
            'registered_date' => ['required'],
            'yearly_cost' => ['required'],
        ]);

        $domain->update([
            'user_id' => Auth::id(),
            'name' => $request['name'],
            'top_level_domain_id' => $request['top_level_domain_id'],
            'registrar_id' => $request['registrar_id'],
            'registered_date' => $request['registered_date'],
            'yearly_cost' => $request['yearly_cost'] * 100,
            'will_autorenew' => $request->has('will_autorenew'),
            'has_ssl_certificate' => $request->has('has_ssl_certificate'),
        ]);

        return redirect()->route('domains.index');
    }

    public function destroy(Domain $domain): Response
    {
        $domain->delete();

        return redirect()->route('domains.index')->with('message', 'The domain has been successfully deleted!');
    }
}
