<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserClientController extends Controller
{
    public function index() {
        $user = User::where('id', Auth::id())->first();
        return view('client/userprofile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');
        if (strlen($user->password) < 8) {
            return redirect()->action([UserClientController::class, 'index'])->with('message', 'Mật khẩu cần đủ ít nhất 8 ký tự!');
        } else if ($user->password != $confirmPassword) {
            return redirect()->action([UserClientController::class, 'index'])->with('message', 'Mật khẩu không trùng khớp!');
        } else {
            $user->save();
            return redirect()->action([UserClientController::class, 'index'])->with('message', 'Cập nhật thông tin thành công!');
        }   
    }
}
