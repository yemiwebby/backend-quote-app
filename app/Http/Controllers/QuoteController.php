<?php

namespace App\Http\Controllers;
use App\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**Function to post a new quote
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postQuote(Request $request)
    {
        $quote = new Quote();
        $quote->content = $request->input('content');
        $quote->save();
        return response()->json(['quote' => $quote], 201);
    }

    /**
     * Function to fetch all quotes and return json response
     * @return \Illuminate\Http\JsonResponse
     */
    public function getQuotes()
    {
        $quotes = Quote::all();
        $response = [
            'quotes' => $quotes
        ];
        return response()->json($response, 200);
    }

    /**
     * Function to update quote
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function putQuote(Request $request, $id)
    {
        $quote = Quote::find($id);

        // check if quote is not found
        if(!$quote)
        {
            return response()->json(['message' => 'Quote not found'], 404);
        }

        $quote->content = $request->input('content');

        $quote->save();
        return response()->json(['quote' => $quote], 200);
    }

    /** Function to delete a quote
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteQuote($id)
    {
        $quote = Quote::find($id);
        $quote->delete();
        return response()->json(['message' => 'Quote deleted'], 200);
    }
}