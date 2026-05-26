<?php

namespace App\Http\Controllers;

use App\Models\Subject;

class SubjectController extends Controller
{
    public function show($id)
    {
        $subject = Subject::with('schedules')->findOrFail($id);
        return view('subjects.show', compact('subject'));
    }
}