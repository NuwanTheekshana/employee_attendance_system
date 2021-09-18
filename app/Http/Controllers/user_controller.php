<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class user_controller extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }

    public function update_profile(Request $request)
    {
        $id = $request->userid;
        $epfno = $request->epfno;
        $fname = $request->fname;
        $lname = $request->lname;
        $address = $request->address;
        $email = $request->email;

        $errors=[ 
            'fname.required'=> 'First name is required.',
            'lname.required'=> 'Last name is required.',
            'email.required'=> 'Email address is Required.',
            'address.required'=> 'Address is required.',
            'email.unique'=> 'Email address has already been taken.',
            ];

        $this->validate($request, [
        'email' => 'required|email',
        'fname' => 'required|string',
        'lname' => 'required|string',
        'address' => 'required|string',
        ],$errors);

        $find_user = User::find($id);
        $find_user_mail = $find_user->email;

        if ($find_user_mail != $email) 
        {
            $this->validate($request, [
                'email' => 'unique:users',
            ],$errors);
        }

        $update_user = User::find($id);
        $update_user->f_name = $fname;
        $update_user->l_name = $lname;
        $update_user->email = $email;
        $update_user->address = $address;
        $update_user->update();

        return response()->json(['success'=>'Profile details update successfully..!']);
    }
}
