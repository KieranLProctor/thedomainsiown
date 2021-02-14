<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Registrar;
use App\Models\TopLevelDomain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = Auth::user()->domains;

        return view('domains.index', ['domains' => $domains]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tlds = TopLevelDomain::all(['id', 'name']);
        $registrars = Registrar::all(['id', 'name']);

        return view('domains.create', [
            'tlds' => $tlds,
            'registrars' => $registrars
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Domain $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        return view('domains.show', ['domain' => $domain]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Domain $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        $tlds = TopLevelDomain::all(['id', 'name']);
        $registrars = Registrar::all(['id', 'name']);

        return view('domains.edit', [
            'tlds' => $tlds,
            'registrars' => $registrars,
            'domain' => $domain
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Domain $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
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

        return redirect()->route('domains.index')->with('message', 'The domain has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Domain $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();

        return redirect()->route('domains.index')->with('message', 'The domain has been successfully deleted!');
    }
}
