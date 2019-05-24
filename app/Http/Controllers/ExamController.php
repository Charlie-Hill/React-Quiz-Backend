<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function all()
    {
        $exams = Exam::all();
        return $exams;
    }

    /**
     * Create a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'exam_name' => 'required|string|max:60',
            'exam_description' => 'required|string|max:255',
            'exam_time' => 'required|int',
            'exam_passmark' => 'required|int'
        ]);

        $exam = Exam::create($request->all());

        return response()->json([
            'message' => 'Success. Exam has been created',
            'exam' => $exam
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        return $exam;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable'
        ]);
        $exam->update($request->all());

        return response()->json([
            'message' => 'Updated exam',
            'task' => $exam
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return response()->json([
            'message' => 'Deleted exam'
        ]);
    }
}
