<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ActivityLog;
use Spatie\ActivityLog\Traits\LogsActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = User::select()->count();
        $activity_log = ActivityLog::with('user')->limit(10)->orderBy('id','DESC')->get();

        return view('home',compact('user','activity_log'));
    }

    public function destroy()
    {
        DB::table('activity_log')->delete();
        Alert::toast('Berhasil menghapus log aktivitas', 'success');
        return redirect()->route('home');
    }
}
