<?php


namespace Modules\System\Http\Controllers\Admin;

use App\Http\Controllers\MyController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Modules\System\Events\AdminLoginEvent;

class LoginController extends MyController
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'logout']);
    }

    /**
     * 显示后台登录模板
     */
    public function showLoginForm()
    {
        return view('system::admin.login');
    }


    /**
     * 使用 admin guard
     */
    protected function guard()
    {
        return auth()->guard('admin');
    }

    /**
     * 重写验证时使用的用户名字段
     */
    public function username()
    {
        return 'name';
    }

    /**
     * 重写验证错误响应
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return $this->jsonErr(['msg' => '身份验证失败.']);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        event(new AdminLoginEvent($this->guard()->user()->id));

        return $request->wantsJson()
            ? $this->jsonSuc(['msg' => '登录成功.'])
            : redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->forget($this->guard()->getName());

        $request->session()->regenerate();

        return $this->jsonSuc(['msg' => '安全退出.']);
    }
}
