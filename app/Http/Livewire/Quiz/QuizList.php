<?php

namespace App\Http\Livewire\Quiz;

use App\Models\Quiz;
use Illuminate\Http\Response;
use Livewire\Component;

class QuizList extends Component
{
    public function render()
    {
        $quizzes = Quiz::withCount('questions')->latest()->paginate();

        return view('livewire.quiz.index', compact('quizzes'));
    }

    public function delete(Quiz $quiz)
    {
        abort_if(! auth()->user()->is_admin, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quiz->delete();
    }
}
