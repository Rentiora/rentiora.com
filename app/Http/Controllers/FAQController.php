<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     * This method returns a list of all FAQs.
     */
    public function index()
    {
        $faqs = FAQ::all();
        return response()->json($faqs);
    }

    /**
     * Store a newly created resource in storage.
     * This method validates the request and creates a new FAQ.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = FAQ::create($request->all());

        return response()->json(['message' => 'FAQ created successfully', 'faq' => $faq], 201);
    }

    /**
     * Display the specified resource.
     * This method returns the details of a specific FAQ.
     */
    public function show($id)
    {
        $faq = FAQ::findOrFail($id);
        return response()->json($faq);
    }

    /**
     * Update the specified resource in storage.
     * This method updates the details of a specific FAQ.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = FAQ::findOrFail($id);
        $faq->update($request->all());

        return response()->json(['message' => 'FAQ updated successfully', 'faq' => $faq]);
    }

    /**
     * Remove the specified resource from storage.
     * This method deletes a specific FAQ.
     */
    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        return response()->json(['message' => 'FAQ deleted successfully']);
    }
}