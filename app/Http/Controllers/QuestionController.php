<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAnswersRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use App\Http\Requests\QuestionFormRequest;
use App\Http\Services\AnswerService;
use App\Http\Services\CategoryService;
use App\Http\Services\QuestionService;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;
    protected $categoryService;
    protected $answerService;

    public function __construct(
        QuestionService $questionService,
        CategoryService $categoryService,
        AnswerService $answerService
    ) {
        $this->questionService = $questionService;
        $this->categoryService = $categoryService;
        $this->answerService = $answerService;
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::paginate(10);
        $categories = $this->categoryService->getAll();
        return view('question.index', compact('questions', 'categories'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('question.create', compact('categories'));
    }

    public function store(QuestionFormRequest $request)
    {
        $answer_content = $request->answer_content;
        $correct_option = $request->corrects;

        if (!in_array(1, $correct_option)) {
            alert("Oops! Some thing wrong", "The question needs at least one correct answer", "error");
            return redirect()->back();
        }
        $question = $this->questionService->create($request->all());
        $answers = [];
        for ($i = 0; $i < count($answer_content); $i++) {
            $answerData = [
                'question_id' => $question->id,
                'answer_content' => $answer_content[$i],
                'correct' => $correct_option[$i],
            ];
            $answer = $this->answerService->create($answerData);
            array_push($answers, $answer);
        };
        if (!$question && !$answers) {
            alert()->error('Create question error', 'Error')->showConfirmButton('OK');
            return redirect()->route('question.create');
        }
        alert()->success('Created new question', 'Successfully')->autoClose(1800);

        return redirect()->route('question.create');
    }

    public function show($id)
    {
        $question = $this->questionService->findById($id);
        return view('question.detail', compact('question'));
    }

    public function edit($id)
    {
        $categories = $this->categoryService->getAll();
        $question = Question::findOrFail($id);
        $answers = $this->answerService->getAnswerByQuestionId($id);

        return view('question.edit', compact('question', 'categories', 'answers'));
    }


    public function update(UpdateQuestionsRequest $questionsRequest, $id)
    {
        $question_data = [
            "question_content" => $questionsRequest->question_content,
            "category_id" => $questionsRequest->category_id,
            "difficulty" => $questionsRequest->difficulty
        ];
        $this->questionService->update($question_data, $id);
        $question = $this->questionService->findById($id);
        $corrects = $questionsRequest->corrects;
        $answers = $questionsRequest->answer_content;
        $answerId = $question->answers;

        if (!$answers) {
            alert("Error", "The question needs at least two answers.", "error");
            return redirect()->back();
        }

        if (count($answers) > count($answerId)) {
            for ($i = 0; $i < count($answers); $i++) {
                $data = [
                    "answer_content" => $answers[$i],
                    "correct" => $corrects[$i]
                ];
                $this->answerService->update($data, $answerId[$i]->id);
                if ($i = count($answers) - 1) {
                    $answerData = [
                        'question_id' => $question->id,
                        'answer_content' => $answers[$i],
                        'correct' => $corrects[$i],
                    ];
                    $this->answerService->create($answerData);
                }
            }
        } else {
            for ($i = 0; $i < count($answerId); $i++) {
                if ($i < count($answers)) {
                    $data = [
                        "answer_content" => $answers[$i],
                        "correct" => $corrects[$i]
                    ];
                    $this->answerService->update($data, $answerId[$i]->id);
                } else {
                    $this->answerService->destroy($answerId[$i]->id);
                }
            }
        }


        alert('Success', "Updated successfully", 'success');

        return redirect()->route('question.index');
    }

    public function destroy($id)
    {
        if ($this->questionService->isQuestionUsedInQuiz($id)) {
            alert()->warning('Delete unavailable!', 'Question already has used in Quiz.')->showConfirmButton('Understood!');
        } else {
            $this->questionService->destroy($id);
            alert()->success('Delete completed', 'Successfully')->autoClose(1800);
        }
        return redirect()->route('question.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $difficulty = $request->difficulty;
        $categories = $this->categoryService->getAll();

        if (!$keyword && !$category_id && !$difficulty) {
            return redirect()->route('question.index');
        }

        if ($keyword && !$category_id && !$difficulty) {
            $questions = Question::where('question_content', 'LIKE', '%' . $keyword . '%')->paginate(10);
            return view('question.index', compact('questions', 'categories'));
        }

        if (!$keyword && $category_id && !$difficulty) {
            $questions = Question::where('category_id', 'LIKE', $category_id)->paginate(10);
            return view('question.index', compact('questions', 'categories'));
        }

        if (!$keyword && !$category_id && $difficulty) {
            $questions = Question::where('difficulty', 'LIKE', $difficulty)->paginate(10);
            return view('question.index', compact('questions', 'categories'));
        }

        if ($keyword && $category_id && !$difficulty) {
            $questions = Question::where('question_content', 'LIKE', '%' . $keyword . '%')
                                 ->where('category_id', 'LIKE', $category_id)
                                 ->paginate(10);
            return view('question.index', compact('questions', 'categories'));
        }

        if ($keyword && !$category_id && $difficulty) {
            $questions = Question::where('question_content', 'LIKE', '%' . $keyword . '%')
                                 ->where('difficulty', 'LIKE', $difficulty)
                                 ->paginate(10);
            return view('question.index', compact('questions', 'categories'));
        }

        if (!$keyword && $category_id && $difficulty) {
            $questions = Question::where('category_id', 'LIKE', $category_id)
                                 ->where('difficulty', 'LIKE', $difficulty)
                                 ->paginate(10);
            return view('question.index', compact('questions', 'categories'));
        }

        if ($keyword && $category_id && $difficulty) {
            $questions = Question::where('category_id', 'LIKE', $category_id)
                                 ->where('difficulty', 'LIKE', $difficulty)
                                 ->where('question_content', 'LIKE', '%' . $keyword . '%')
                                 ->paginate(10);
            return view('question.index', compact('questions', 'categories'));
        }
    }
}
