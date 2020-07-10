<?php

namespace App\Http\Controllers;

use App\Http\Services\AnswerService;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    protected $answerService;

    public function __construct(AnswerService $answerService) {
        $this->answerService = $answerService;
    }

    public function destroy($id)
    {
        $this->answerService->destroy($id);
        alert()->success('Delete completed', 'Successfully')->autoClose(1800);

        return redirect()->back();
    }
}
