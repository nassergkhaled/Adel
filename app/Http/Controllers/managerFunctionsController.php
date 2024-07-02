<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class managerFunctionsController extends Controller
{

    public function joinRequests()
    {
        $user = Auth::user();
        $myOfficeUsers = User::where('office_id', $user->id);
        $bendingRequests = $myOfficeUsers->where('acceptedByManager', false)->whereIn('role', ['Secretary', 'Lawyer'])->get();
        $acceptedRequests = $myOfficeUsers->where('acceptedByManager', true)->whereIn('role', ['Secretary', 'Lawyer'])->get();
        $data = [
            'acceptedRequests' => $acceptedRequests,
            'bendingRequests' => $bendingRequests,
        ];
        return view('manager.joinRequests', compact('data'));
    }
    public function updateJoinRequests($user_id, Request $request)
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

        $data = [
            'acceptedByManager' => $request->action == 1 ? 1 : 0,
        ];
        if ($request->action == 0)
            $data += ['office_id' => null];

        User::find($user_id)->update($data);
        if ($request->action)
            return redirect()->back()->with('msg', 'Request accepted successfully!');
        else
            return redirect()->back()->with('msg', 'Request rejected successfully!');
    }
}
