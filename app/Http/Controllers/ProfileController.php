<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\Manager;
use App\Models\Secretary;
use App\Models\User;
use App\Rules\UniquePhone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.show')->with('status', 'profile-updated');
    }

    public function updateBasicInfo(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'address' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'max:15']

        ]);
        if ($request->old_phone != $request->phone)
            $request->validate([
                // 'phone' => [new UniquePhone],
                'phone' => ['unique:users,phone_number'],
            ]);

        $user = User::findOrFail(Auth::id());
        $user->first_name = strip_tags($request->first_name);
        $user->last_name = strip_tags($request->last_name);
        $user->phone_number = strip_tags($request->phone);
        $user->address = strip_tags($request->address);
        $user->save();

        // $role = auth()->user()->roles->first();
        // switch ($role->role) {
        //     case 'manager':
        //         $manager = Manager::where('user_id',Auth::id())->first();
        //         $manager->phone_number = strip_tags($request->phone);
        //         $manager->address = strip_tags($request->address);
        //         $manager->save();
        //         break;
        //     case 'client':
        //         $client = Client::where('role_id',$role->id)->first();
        //         $client->contact_info["phone"] = strip_tags($request->phone);
        //         $client->address = strip_tags($request->address);
        //         $client->save();
        //         break;
        //     case 'secretary':
        //         $secretary = Secretary::where('user_id',Auth::id())->first();
        //         $secretary->contact_info["phone"] = strip_tags($request->phone);
        //         $secretary->address = strip_tags($request->address);
        //         $secretary->save();
        //         break;
        //     case 'lawyer':
        //         $lawyer = Lawyer::where('user_id',Auth::id())->first();
        //         $lawyer->contact_info["phone"] = strip_tags($request->phone);
        //         $lawyer->address = strip_tags($request->address);
        //         $lawyer->save();
        //         break;
        //     default:
        //         abort(404);
        //         break;
        // }
        return redirect()->back()->with(['msg' => 'Profile Updated Successfully']);
    }


    private function updateAvatar($newAvatar)
    {
        $avatar =  'Avatar-' . uniqid() . '.' . $newAvatar->extension();
        $newAvatar->move(public_path('images/avatars'), $avatar);
        $oldAvatar =  Auth::User()->avatar;
        if ($oldAvatar) {
            $oldAvatarPath = public_path('images/avatars') . '/' . $oldAvatar;
            if (file_exists($oldAvatarPath)) {
                unlink($oldAvatarPath);
            }
        }
        User::where('id', Auth::id())->update(['avatar' => $avatar]);
    }


    public function Update_Avatar_Email(Request $request)
    {
        // Validate request inputs
        $request->validate([
            'Email' => 'nullable|string|email',
            'Avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($request->hasFile('Avatar')) {
            if ($request->file('Avatar')->isValid()) {
                $this->updateAvatar($request->Avatar);
            }
        }

        if ($request->Email && $request->Email != Auth::user()->email) {
            User::where('id', Auth::id())->update(['email' => $request->Email]);
            User::where('id', Auth::id())->update(['email_verified_at' => null]);
        }


        return back()->with('msg', "Profile Updated Successfully");
    }




    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
