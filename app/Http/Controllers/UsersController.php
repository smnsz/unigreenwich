<?php

namespace Community\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use JavaScript;
use Community\Http\Controllers\Controller;
use Community\Http\Requests;
use Community\Http\Requests\UpdatePasswordRequest;
use Community\Http\Requests\UpdateUserRequest;
use Community\Jobs\SaveImageFile;
use Community\User;

class UsersController extends Controller
{

    public function index()
    {
        $usersCount = User::count();
        $users = User::latest()->simplePaginate(200);

        return view('users.index', compact('users', 'usersCount'));
    }

    public function account()
    {
        $user = $this->user;
        return view('users.account', compact('user'));
    }

    public function profile(User $user)
    {
        JavaScript::put([
            'latitude' => $user->latitude,
            'longitude' => $user->longitude
        ]);

        return view('users.profile', compact('user'));
    }

    public function edit_account()
    {
        $user = $this->user;
        return view('users.edit', compact('user'));
    }
    
    public function update_account(UpdateUserRequest $request)
    {
        $data = $request->all();

        if(isset($data['avatar'])){
          $data['avatar'] = $this->saveImage($request->avatar);

          if(isset($this->user->avatar)){
            $this->deleteCurrentAvatar($this->user->avatar);
          }
        }

        $this->user->update($data);

        session()->flash('success-message', 'Your account has been successfully updated.');

        return redirect()->route('account_path');
    }

    public function new_password()
    {
        return view('users.new_password');
    }

    public function update_password(UpdatePasswordRequest $request)
    {
        if ($this->theCurrentPasswordProvidedIsCorrect($request)) {

            $this->updateUserPassword($request);
            session()->flash('success-message', 'Your password has been successfully updated.');
            return redirect()->back();

        } else {
            return redirect()->back()->withErrors(['current_password' => 'Your current password is incorrect.']);
        }
    }

    private function theCurrentPasswordProvidedIsCorrect($request)
    {
        return Hash::check($request->current_password, $request->user()->password);
    }

    private function updateUserPassword($request)
    {
        $this->user->update(['password' => bcrypt($request->password)]);
    }

    private function saveImage($image)
    {
        return $this->dispatch(
            new SaveImageFile($image)
        );
    }

    private function deleteCurrentAvatar($avatar)
    {
        if (file_exists(config('upload_paths.avatars')))
            Storage::delete(config('upload_paths.avatars') . $avatar);
    }
}
