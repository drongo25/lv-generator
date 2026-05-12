<?php

namespace App\Http\Controllers\API;

use App\Models\WebOurClientFeedback;
use App\Http\Requests\API\CreateWebOurClientFeedbackAPIRequest;
use App\Http\Requests\API\UpdateWebOurClientFeedbackAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebOurClientFeedbackAPIController extends AppBaseController
{
    /**
     * Display a listing of the WebOurClientFeedback.
     * GET /api/web_our_client_feedbacks
     */
    public function index(Request $request): JsonResponse
    {
        $query = WebOurClientFeedback::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Web Our Client Feedbacks retrieved successfully');
    }

    /**
     * Store a newly created WebOurClientFeedback.
     * POST /api/web_our_client_feedbacks
     */
    public function store(CreateWebOurClientFeedbackAPIRequest $request): JsonResponse
    {
        $webOurClientFeedback = WebOurClientFeedback::create($request->all());
        return $this->sendResponse($webOurClientFeedback->toArray(), 'Web Our Client Feedback saved successfully');
    }

    /**
     * Display the specified WebOurClientFeedback.
     * GET /api/web_our_client_feedbacks/{id}
     */
    public function show(int $id): JsonResponse
    {
        $webOurClientFeedback = WebOurClientFeedback::find($id);
        if (empty($webOurClientFeedback)) {
            return $this->sendError('Web Our Client Feedback not found');
        }
        return $this->sendResponse($webOurClientFeedback->toArray(), 'Web Our Client Feedback retrieved successfully');
    }

    /**
     * Update the specified WebOurClientFeedback.
     * PUT /api/web_our_client_feedbacks/{id}
     */
    public function update(int $id, UpdateWebOurClientFeedbackAPIRequest $request): JsonResponse
    {
        $webOurClientFeedback = WebOurClientFeedback::find($id);
        if (empty($webOurClientFeedback)) {
            return $this->sendError('Web Our Client Feedback not found');
        }
        $webOurClientFeedback->fill($request->all())->save();
        return $this->sendResponse($webOurClientFeedback->toArray(), 'Web Our Client Feedback updated successfully');
    }

    /**
     * Remove the specified WebOurClientFeedback.
     * DELETE /api/web_our_client_feedbacks/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $webOurClientFeedback = WebOurClientFeedback::find($id);
        if (empty($webOurClientFeedback)) {
            return $this->sendError('Web Our Client Feedback not found');
        }
        $webOurClientFeedback->delete();
        return $this->sendSuccess('Web Our Client Feedback deleted successfully');
    }
}