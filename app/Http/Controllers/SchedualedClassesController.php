<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SchedualedClass;



class SchedualedClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $schedualedclasses = Auth::user()->schedualedClasses()->where('date_time', '>', now())->oldest('date_time')->get();
        return view('instructor.upcoming')->with('schedualedClasses', $schedualedclasses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classTypes = ClassType::all();
        return view('instructor.schedule')->with('classTypes', $classTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $date_time = $request->input('date') . " " . $request->input('time');
        $request->merge([
            'date_time' => $date_time,
            'instructor_id' => Auth::id(),
        ]);
        $validated = $request->validate([
            'class_type_id' => 'required',
            'instructor_id' => 'required',
            'date_time' => 'required|unique:schedualed_classes,date_time|after:now'
        ]);
        SchedualedClass::create($validated);

        return redirect()->route('schedule.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchedualedClass $schedule)
    {
        //
        if (Auth::user()->id !== $schedule->instructor_id) {
            return $schedule;
            abort(403);
        }
        $schedule->delete();
        return redirect()->route('schedule.index');
    }
}