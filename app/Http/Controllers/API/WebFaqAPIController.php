<?php

namespace App\Http\Controllers\API;

use App\Models\WebFaq;
use App\Http\Requests\API\CreateWebFaqAPIRequest;
use App\Http\Requests\API\UpdateWebFaqAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebFaqAPIController extends AppBaseController
{
    /**
     * Display a listing of the WebFaq.
     * GET /api/web_faqs
     */
    public function index(Request $request): JsonResponse
    {
        $query = WebFaq::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Web Faqs retrieved successfully');
    }

    /**
     * Store a newly created WebFaq.
     * POST /api/web_faqs
     */
    public function store(CreateWebFaqAPIRequest $request): JsonResponse
    {
        $webFaq = WebFaq::create($request->all());
        return $this->sendResponse($webFaq->toArray(), 'Web Faq saved successfully');
    }

    /**
     * Display the specified WebFaq.
     * GET /api/web_faqs/{id}
     */
    public function show(int $id): JsonResponse
    {
        $webFaq = WebFaq::find($id);
        if (empty($webFaq)) {
            return $this->sendError('Web Faq not found');
        }
        return $this->sendResponse($webFaq->toArray(), 'Web Faq retrieved successfully');
    }

    /**
     * Update the specified WebFaq.
     * PUT /api/web_faqs/{id}
     */
    public function update(int $id, UpdateWebFaqAPIRequest $request): JsonResponse
    {
        $webFaq = WebFaq::find($id);
        if (empty($webFaq)) {
            return $this->sendError('Web Faq not found');
        }
        $webFaq->fill($request->all())->save();
        return $this->sendResponse($webFaq->toArray(), 'Web Faq updated successfully');
    }

    /**
     * Remove the specified WebFaq.
     * DELETE /api/web_faqs/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $webFaq = WebFaq::find($id);
        if (empty($webFaq)) {
            return $this->sendError('Web Faq not found');
        }
        $webFaq->delete();
        return $this->sendSuccess('Web Faq deleted successfully');
    }
}