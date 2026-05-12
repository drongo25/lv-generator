<?php

namespace App\Http\Controllers\API;

use App\Models\WebOurTeam;
use App\Http\Requests\API\CreateWebOurTeamAPIRequest;
use App\Http\Requests\API\UpdateWebOurTeamAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebOurTeamAPIController extends AppBaseController
{
    /**
     * Display a listing of the WebOurTeam.
     * GET /api/web_our_teams
     */
    public function index(Request $request): JsonResponse
    {
        $query = WebOurTeam::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Web Our Teams retrieved successfully');
    }

    /**
     * Store a newly created WebOurTeam.
     * POST /api/web_our_teams
     */
    public function store(CreateWebOurTeamAPIRequest $request): JsonResponse
    {
        $webOurTeam = WebOurTeam::create($request->all());
        return $this->sendResponse($webOurTeam->toArray(), 'Web Our Team saved successfully');
    }

    /**
     * Display the specified WebOurTeam.
     * GET /api/web_our_teams/{id}
     */
    public function show(int $id): JsonResponse
    {
        $webOurTeam = WebOurTeam::find($id);
        if (empty($webOurTeam)) {
            return $this->sendError('Web Our Team not found');
        }
        return $this->sendResponse($webOurTeam->toArray(), 'Web Our Team retrieved successfully');
    }

    /**
     * Update the specified WebOurTeam.
     * PUT /api/web_our_teams/{id}
     */
    public function update(int $id, UpdateWebOurTeamAPIRequest $request): JsonResponse
    {
        $webOurTeam = WebOurTeam::find($id);
        if (empty($webOurTeam)) {
            return $this->sendError('Web Our Team not found');
        }
        $webOurTeam->fill($request->all())->save();
        return $this->sendResponse($webOurTeam->toArray(), 'Web Our Team updated successfully');
    }

    /**
     * Remove the specified WebOurTeam.
     * DELETE /api/web_our_teams/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $webOurTeam = WebOurTeam::find($id);
        if (empty($webOurTeam)) {
            return $this->sendError('Web Our Team not found');
        }
        $webOurTeam->delete();
        return $this->sendSuccess('Web Our Team deleted successfully');
    }
}