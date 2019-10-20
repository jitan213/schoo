<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserProfile;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);

        // routes.phpでこのAuthControllerが呼ばれたらconstructだからこのメソッドが絶対呼ばれる
        //ログイン、ログアウト、新規登録した後にどの画面に飛ぶかを書いている
        //redirectPathというプロパティにtweets.indexというツイート一覧画面のURLを渡してあげて、ユーザーが作成されたあとはツイート一覧画面へリダレクト
        $this->redirectPath = route('tweets.index');        
        //ログインされたあとはツイート一覧画面へリダイレクト
        $this->loginPath = route('tweets.index');
        //ログアウトしたあとはログイン画面へリダイレクト
        $this->redirectAfterLogout = route('auth.getLogin');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //returnだとそこで処理が終わってしまってuserprofilesの保存をする隙間がないから$userに変更
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        //user_profilesの保存
        $user_profile = new UserProfile();
        $user_profile->introduction = "こんにちは！{ $user->name }です！";
        $user_profile->birthday = '1990-01-01';
        //普通は
        //$user_profile->user_id = $user->id;
        //$user->idはインクリメントのやつ
        //$user_profile->save();
        //こうするけど今回は、
        $user->userProfile()->save($user_profile);
        //userprofile()はUse.phpというモデルに定義されているメソッド
        //save($user_profile)の$user_profileはこの上でnewしたやつのこと
        //この処理を行うと上の$user->~~~の$userに関連したレコードとしてsave->($user_profile)の$user_profileが保存される
        //！！！！！！要復習！！！！！！

        return $user;

    }
}
