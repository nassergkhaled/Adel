<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class joinRequestsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $myOfficeUsers = User::where('office_id', $user->id);
        $bendingRequests = $myOfficeUsers->where('acceptedByManager', false)->get();
        $acceptedRequests = $myOfficeUsers->where('acceptedByManager', true)->get();
        $data = [
            'acceptedRequests' => $acceptedRequests,
            'bendingRequests' => $bendingRequests,
        ];
        return view('manager.joinRequests', compact('data'));
    }
    public function update($user_id, Request $request)
    {
        $validated = Validator::make($request->all(), [
            'action' => 'required|in:1,0',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }


        $user = Auth::user();
        $myOfficeUsers = User::where('office_id', $user->id);
        $bendingRequestsExist = $myOfficeUsers->where('acceptedByManager', false)->where('id', $user_id)->first();
        if (!$bendingRequestsExist) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Unautherized!');
        }

        $min = -1;
        User::find($user_id)->update([
            'acceptedByManager' => $request->action == 1 ? 1 : -1,
        ]);
        if ($request->action)
            return redirect()->back()->with('msg', 'Request accepted successfully!');
        else
            return redirect()->back()->with('msg', 'Request rejected successfully!');
    }
}
