<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comments\CommentContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private CommentContract $commentManager;

    public function __construct(CommentContract $commentManager)
    {
        $this->commentManager = $commentManager;
    }

    public function store(CommentRequest $request)
    {
        $validatedData = $request->validated()['data'];
        $validatedData['user_id'] = Auth::id();

        $this->commentManager->store($validatedData);

        return response()->json([
            'status' => 'OK'
        ]);
    }

    public function get(Request $request)
    {
        return $this->commentManager->getComments($request->cypher_id);
    }
}
