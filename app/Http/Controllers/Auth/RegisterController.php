<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\ActivationService; 
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Mail;
use Illuminate\Support\Facades\Input;
use Log;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    protected $activationService;
    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Custom construct that injects an ActivationService object
     * 
     */
    public function _construct(ActivationService $activationService){

        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->activationService = $activationService;
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
            'password' => 'required|min:6|confirmed',
            'confirmation_code'
        ]);
    }

    /**
     * Overriding register function for RegisterUsers the registration request for the application.
     * Want to update this register function to work with email
     * verification.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $this->validator($request->all())->validate(); //validates our post request

        //$request->all() -> an array of data passed from post



        $confirmation_code = str_random(30);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'confirmation_code' => $confirmation_code,
        ]);

        //creates our registered user
        event(new Registered($user)); 


        $this->guard()->login($user);



        $data['confirmation_code'] = $confirmation_code;
        //MAIL component
        Mail::send('registeremail', $data, function($message){
            $message->to(Input::get('email'), Input::get('name'))->subject('Verify your email address');
        });

        flash('Thanks for signing up! Please check your email.', 'success');


        return redirect('/'); //redirect to laravel page
    }



    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    /**
     *
     * Confirms an email
     * @param $confirmation_code
     * @return mixed
     */
    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            flash('Confirmation code does not exist', 'danger');
            return redirect('/home');
        }

        $user = User::where('confirmation_code' , $confirmation_code)->first();

        if ( ! $user)
        {
            flash('Confirmation code does not exist', 'danger');
            return redirect('/home');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        flash('You have successfully verified your account', 'success');

        return redirect('/login');
    }
}
