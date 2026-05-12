<?php

namespace App\Http\Controllers;

use App\Models\WebFaq;
use App\Http\Requests\CreateWebFaqRequest;
use App\Http\Requests\UpdateWebFaqRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebFaqController extends Controller
{
    public function index(Request $request)
    {
        $webFaqs = WebFaq::paginate(15);
        return view('web_faqs.index', compact('webFaqs'));
    }

    public function create()
    {
        return view('web_faqs.create');
    }

    public function store(CreateWebFaqRequest $request)
    {
        WebFaq::create($request->validated());
        return redirect()->route('web-faqs.index')
            ->with('success', 'WebFaq created successfully.');
    }

    public function show($id)
    {
        $webFaq = WebFaq::findOrFail($id);
        return view('web_faqs.show', compact('webFaq'));
    }

    public function edit($id)
    {
        $webFaq = WebFaq::findOrFail($id);
        return view('web_faqs.edit', compact('webFaq'));
    }

    public function update($id, UpdateWebFaqRequest $request)
    {
        $webFaq = WebFaq::findOrFail($id);
        $webFaq->update($request->validated());
        return redirect()->route('web-faqs.index')
            ->with('success', 'WebFaq updated successfully.');
    }

    public function destroy($id)
    {
        WebFaq::findOrFail($id)->delete();
        return redirect()->route('web-faqs.index')
            ->with('success', 'WebFaq deleted successfully.');
    }
}