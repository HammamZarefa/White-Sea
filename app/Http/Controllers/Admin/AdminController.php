<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminNotification;
use App\Models\Deposit;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\User;
use App\Models\UserLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function search()
    {

        $extension = '.blade.php';
        $path = 'resources/views';
        $names = ['dashboard'];
        $files = array_diff(scandir($path), array('..', '.'));
        dd($files);
        foreach ($files as $f) {
            $abs_path = $path . '/' . $f;
            if (is_dir($abs_path)) { //directory, recurse


            } else {  //file, test if the name ends with $extension
                $ext_length = strlen($extension);
                if (substr($f, -$ext_length) === $extension) {
                    $names[] = $f;

                }
            }
        }
    }


    public function dashboard()
    {
        $page_title = 'Dashboard';

//        // User Info
//        $widget['total_users'] = User::count();
//        $widget['verified_users'] = User::where('status', 1)->count();
//        $widget['email_unverified_users'] = User::where('ev', 0)->count();
//        $widget['sms_unverified_users'] = User::where('sv', 0)->count();
//        $widget['banned_users'] = User::where('status', 0)->count();

//        //2nd row
//        $widget['total_orders'] = Order::count();
//        $widget['pending_orders'] = Order::pending()->count();
//        $widget['processing_orders'] = Order::processing()->count();
//        $widget['completed_orders'] = Order::completed()->count();
//        $widget['cancelled_orders'] = Order::cancelled()->count();
//        $widget['refunded_orders'] = Order::refunded()->count();

//        // Monthly Deposit Report Graph
//        $report['months'] = collect([]);
//        $report['deposit_month_amount'] = collect([]);


//        $depositsMonth = Deposit::whereYear('created_at', '>=', Carbon::now()->subYear())
//            ->selectRaw("SUM( CASE WHEN status = 1 THEN amount END) as depositAmount")
//            ->selectRaw("DATE_FORMAT(created_at,'%M') as months")
//            ->orderBy('created_at')
//            ->groupBy(DB::Raw("MONTH(created_at)"))->get();
//
//        $depositsMonth->map(function ($aaa) use ($report) {
//            $report['months']->push($aaa->months);
//            $report['deposit_month_amount']->push(getAmount($aaa->depositAmount));
//        });


//        // user Browsing, Country, Operating Log
//        $user_login_data = UserLogin::whereDate('created_at', '>=', \Carbon\Carbon::now()->subDay(30))->get(['browser', 'os', 'country']);
//
//        $chart['user_browser_counter'] = $user_login_data->groupBy('browser')->map(function ($item, $key) {
//            return collect($item)->count();
//        });
//        $chart['user_os_counter'] = $user_login_data->groupBy('os')->map(function ($item, $key) {
//            return collect($item)->count();
//        });
//        $chart['user_country_counter'] = $user_login_data->groupBy('country')->map(function ($item, $key) {
//            return collect($item)->count();
//        })->sort()->reverse()->take(5);


//        $payment['total_deposit_amount'] = Deposit::where('status',1)->sum('amount');
//        $payment['total_deposit_charge'] = Deposit::where('status',1)->sum('charge');
//        $payment['total_deposit_pending'] = Deposit::where('status',2)->count();
//        $payment['total_deposit'] = Deposit::where('status',1)->count();


//        $latestUser = User::latest()->limit(6)->get();
        $empty_message = 'User Not Found';
        $shipments = Shipment::orderBy('id', 'desc')->with('status')
            ->withSum('shipmentItems','packages_number')
            ->withSum('shipmentItems','down_payment')
            ->withSum('shipmentItems','second_installment')
            ->withSum('shipmentItems','remaining_amount')
            ->withSum('shipmentItems','cost')
            ->withSum('shipmentItems','weight')
            ->get();
        return view('admin.dashboard', compact('page_title', 'shipments', 'empty_message'));
    }


    public function profile()
    {
        $page_title = 'Profile';
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('page_title', 'admin'));
    }

    public function profileUpdate(Request $request)
    {

        $user = Auth::guard('admin')->user();

        if ($request->hasFile('image')) {
            try {
                $old = $user->image ?: null;
                $user->image = uploadImage($request->image, imagePath()['profile']['admin']['path'], imagePath()['profile']['admin']['size'], $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $notify[] = ['success', 'Your profile has been updated.'];
        return redirect()->route('admin.profile')->withNotify($notify);
    }


    public function password()
    {
        $page_title = 'Password Setting';
        $admin = Auth::guard('admin')->user();
        return view('admin.password', compact('page_title', 'admin'));
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = Auth::guard('admin')->user();
        if (!Hash::check($request->old_password, $user->password)) {
            $notify[] = ['error', 'Password Do not match !!'];
            return back()->withErrors(['Invalid old password.']);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $notify[] = ['success', 'Password Changed Successfully.'];
        return redirect()->route('admin.password')->withNotify($notify);
    }

    public function notifications()
    {
        $notifications = AdminNotification::orderBy('id', 'desc')->paginate(getPaginate());
        $page_title = 'Notifications';
        return view('admin.notifications', compact('page_title', 'notifications'));
    }


    public function notificationRead($id)
    {
        $notification = AdminNotification::findOrFail($id);
        $notification->read_status = 1;
        $notification->save();
        return redirect($notification->click_url);
    }

    public function admins()
    {
        $admins = Admin::all();
        $page_title = 'Employees';
        return view('admin.admins.list', compact('admins', 'page_title'));
    }

    public function create()
    {
        $page_title = 'Add new emplyee';
        return view('admin.admins.create', compact( 'page_title'));
    }

    public function details($id)
    {
        $admin=Admin::findorfail($id);
        $page_title = 'update  emplyee';
        return view('admin.admins.detail', compact( 'admin','page_title'));
    }

    public function update(Request $request,$id)
    {
        $admin=Admin::findorfail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->is_super= $request->is_super ? 1 : 0;
        $admin->save();
        $notify[] = ['success', 'profile has been updated.'];
        return redirect()->back()->withNotify($notify);
    }

    public function adminPasswordUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'password' => 'required|min:5|confirmed',
        ]);

        $user = Admin::findorfail($id);
        $user->password = bcrypt($request->password);
        $user->save();
        $notify[] = ['success', 'Password Changed Successfully.'];
        return redirect()->back()->withNotify($notify);
    }

    public function destroy($id)
    {
        $admin=Admin::findorfail($id);
        $admin->delete();
        $notify[] = ['success', 'Deleted Successfully.'];
        return redirect()->back()->withNotify($notify);
    }
}
