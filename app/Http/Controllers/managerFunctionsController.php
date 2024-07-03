<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\Secretary;
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
        $data = [
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
        $userExist = $myOfficeUsers->where('acceptedByManager', false)->where('id', $user_id)->first();
        if (!$userExist) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Unautherized!');
        }

        $wantedUser = User::find($user_id);
        $data = [
            'acceptedByManager' => $request->action == 1 ? 1 : 0,
        ];
        if ($request->action == 0) {
            $data += [
                'office_id' => null,
                'completeRegistration' => false,
                'phone_number' => null,
                'role' => 'New User',
                'id_number' => null,
            ];

            switch ($wantedUser->role) {
                case "Lawyer":
                    Lawyer::find($wantedUser->id)->delete();
                    break;
                case "Secretary":
                    Secretary::find($wantedUser->id)->delete();
                    break;
            }
        }

        $wantedUser->update($data);


        if ($request->action)
            return redirect()->back()->with('msg', 'Request accepted successfully!');
        else
            return redirect()->back()->with('msg', 'Request rejected successfully!');
    }
    public function officeMembers()
    {
        $user = Auth::user();
        $myOfficeUsers = User::where('office_id', $user->id);
        $acceptedRequests = $myOfficeUsers->where('acceptedByManager', true)->whereIn('role', ['Secretary', 'Lawyer'])->get();
        $data = [
            'acceptedRequests' => $acceptedRequests,
        ];
        return view('manager.officeMembers', compact('data'));
    }
    public function updateMemberAccess($user_id, Request $request)
    {
        $validated = Validator::make($request->all(), [
            'action' => 'required|in:1,0',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }


        $user = Auth::user();
        $myOfficeUsers = User::where('office_id', $user->id);
        $userExist = $myOfficeUsers->where('acceptedByManager', true)->where('id', $user_id)->first();
        if (!$userExist) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Unautherized!');
        }

        $user = User::find($user_id);
        $user->access = $request->action == 1 ? true : false;
        $user->save();


        if ($request->action)
            return redirect()->back()->with('msg', 'Member access permissions have been successfully restored.');
        else
            return redirect()->back()->with('msg', 'Member access permissions have been successfully suspended.');
    }
}
