<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Livewire\Component;

class QuestionList extends Component
{
    public function render(): View
    {
        $questions = Question::latest()->paginate();

        return view('livewire.questions.question-list', compact('questions'));
    }

    public function delete(Question $question): void
    {
        abort_if(! auth()->user()->is_admin, Response::HTTP_FORBIDDEN, 'Forbidden Action');

        $question->delete();
    }
}
