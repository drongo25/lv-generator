<?php

namespace App\Http\Controllers;

use App\Models\WebOurClientFeedback;
use App\Http\Requests\CreateWebOurClientFeedbackRequest;
use App\Http\Requests\UpdateWebOurClientFeedbackRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebOurClientFeedbackController extends Controller
{
    public function index(Request $request)
    {
        $webOurClientFeedbacks = WebOurClientFeedback::paginate(15);
        return view('web_our_client_feedbacks.index', compact('webOurClientFeedbacks'));
    }

    public function create()
    {
        return view('web_our_client_feedbacks.create');
    }

    public function store(CreateWebOurClientFeedbackRequest $request)
    {
        WebOurClientFeedback::create($request->validated());
        return redirect()->route('web-our-client-feedbacks.index')
            ->with('success', 'WebOurClientFeedback created successfully.');
    }

    public function show($id)
    {
        $webOurClientFeedback = WebOurClientFeedback::findOrFail($id);
        return view('web_our_client_feedbacks.show', compact('webOurClientFeedback'));
    }

    public function edit($id)
    {
        $webOurClientFeedback = WebOurClientFeedback::findOrFail($id);
        return view('web_our_client_feedbacks.edit', compact('webOurClientFeedback'));
    }

    public function update($id, UpdateWebOurClientFeedbackRequest $request)
    {
        $webOurClientFeedback = WebOurClientFeedback::findOrFail($id);
        $webOurClientFeedback->update($request->validated());
        return redirect()->route('web-our-client-feedbacks.index')
            ->with('success', 'WebOurClientFeedback updated successfully.');
    }

    public function destroy($id)
    {
        WebOurClientFeedback::findOrFail($id)->delete();
        return redirect()->route('web-our-client-feedbacks.index')
            ->with('success', 'WebOurClientFeedback deleted successfully.');
    }
}