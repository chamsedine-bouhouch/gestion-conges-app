<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Enums\LeaveStatus;
use Illuminate\Http\Request;
use App\Http\Requests\LeaveStoreRequest;

class LeaveController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leaves.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaveStoreRequest $request)
    {
       try {
        Leave::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => $request->user()->id,
            'commentaire' => $request->commentaire,
            'status' => LeaveStatus::ENATTENTE,
        ]);
       } catch (\Throwable $th) {
        return redirect()->withInput();
       }
        return redirect()->route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
    {
        if ($request->status === 'approve') {
            $leave->update([
                'status' =>  LeaveStatus::APPROUVE
            ]);
        } else if ($request->status === 'refuse') {
            $leave->update([
                'status' =>  LeaveStatus::REFUSE
            ]);
        }
        return back();
    }
}
