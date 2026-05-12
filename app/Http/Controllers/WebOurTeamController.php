<?php

namespace App\Http\Controllers;

use App\Models\WebOurTeam;
use App\Http\Requests\CreateWebOurTeamRequest;
use App\Http\Requests\UpdateWebOurTeamRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebOurTeamController extends Controller
{
    public function index(Request $request)
    {
        $webOurTeams = WebOurTeam::paginate(15);
        return view('web_our_teams.index', compact('webOurTeams'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $webOurTeam->field ?? ''
        $webOurTeam = new WebOurTeam();
        return view('web_our_teams.create', compact('webOurTeam'));
    }

    public function store(CreateWebOurTeamRequest $request)
    {
        WebOurTeam::create($request->validated());
        return redirect()->route('web-our-teams.index')
            ->with('success', 'WebOurTeam created successfully.');
    }

    public function show($id)
    {
        $webOurTeam = WebOurTeam::findOrFail($id);
        return view('web_our_teams.show', compact('webOurTeam'));
    }

    public function edit($id)
    {
        $webOurTeam = WebOurTeam::findOrFail($id);
        return view('web_our_teams.edit', compact('webOurTeam'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateWebOurTeamRequest $request, $id)
    {
        $webOurTeam = WebOurTeam::findOrFail($id);
        $webOurTeam->update($request->validated());
        return redirect()->route('web-our-teams.index')
            ->with('success', 'WebOurTeam updated successfully.');
    }

    public function destroy($id)
    {
        WebOurTeam::findOrFail($id)->delete();
        return redirect()->route('web-our-teams.index')
            ->with('success', 'WebOurTeam deleted successfully.');
    }
}