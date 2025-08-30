<?php

namespace App\Http\Controllers;

use App\Models\SchedualedClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //
    function display()
    {
        $schedualedClasses = SchedualedClass::upcoming()->with('classType', 'instructor')->whereDoesntHave('members', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->oldest('date_time')->get();
        return view('member.book')->with('schedualedClasses', $schedualedClasses);
    }
    function store(Request $request)
    {
        Auth::user()->bookings()->attach($request->schedualed_class_id);
        return redirect()->route('booking.index');
    }
    function index()
    {
        $bookings = Auth::user()->bookings()->upcoming()->get();

        return view('member.upcoming')->with('bookings', $bookings);
    }
    function destroy(int $id)
    {
        Auth::user()->bookings()->detach($id);
        return redirect()->route('booking.index');
    }
}