<?php

namespace App\Http\Controllers;

use App\Course;
use App\Enroll;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function courses()
    {
        $enrolls = auth()->user()->enrolls;

        return view('users.courses', compact('enrolls'));
    }

    public function lesson(Course $course, $id)
    {
        if (!Enroll::whereUserId(auth()->user()->id)->whereCourseId($course->id)) {
            return abort(404, 'You have not purchased this course yet!');
        }
        $lesson = Lesson::find($id);
        $video = '';
        for ($i = strpos($lesson->video, 'v=') + 2; $i < strlen($lesson->video); $i++) {
            $video .= $lesson->video[$i];
        }

        if (!$course->lessons()->find($id)) {
            return abort(404);
        }

        $lessons = $course->lessons;

        return view('users.lesson', compact(['course', 'lesson', 'lessons', 'video']));
    }

    public function user_profile()
    {
        return view('users.user-profile');
    }

    public function user_profile_update(Request $request)
    {
        $user = auth()->user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return back();
    }

    public function user_credentials_update(Request $request)
    {
        if (!(Hash::check($request->get('current_password'), auth()->user()->password))) {
            // The passwords doesn't matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('new_password'), $request->get('confirm_new_password')) != 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $this->validate(request(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
        ]);

        //Change Password
        $user = auth()->user();
        $user->email = $request->email;
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully");
    }

    public function user_photo_update(Request $request)
    {
        $originalImage = $request->file('user_image');
        $imageName = time() . $originalImage->getClientOriginalName();
        $originalImage = Image::make($originalImage);
        $originalPath = public_path() . '/images/';
        //dd($originalPath);
        $originalImage->save($originalPath . $imageName);

        $user = auth()->user();
        $user->photo = $imageName;
        $user->save();

        return back();
    }
}
