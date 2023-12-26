<?php

namespace App\Http\Controllers;
use PDF;
use Carbon\Carbon;
use App\Models\Bus;
use App\Models\BusRoutes;
use App\Models\User;
use App\Models\BusStop;
use App\Models\TicketSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // user Controller
    public function user_type_check(){
        //dd(Auth::user());
        if(Auth::id()){
            $usertype=Auth()->user()->role;
            //$userID=Auth()->user()->id;
            // return $usertype;
            if($usertype=== 0){
            // Total User count process
            $totalUser = User::where('role', '=', 1)->get()->count();
            
            // Total Route count process
            $totalRoute = BusStop::get()->count();

            // Total Booking count process
            $totalBooking = TicketSale::get()->count();

            // Total Bus count process
            $totalBus = Bus::get()->count();

            // Pass the counts to the view
            return view('adminDashboard.index', ['totalUser' => $totalUser, 'totalBus' => $totalBus, 'totalBooking' => $totalBooking, 'totalRoute' => $totalRoute]);
            // return view('dashboard');

            } elseif($usertype=== 1) {
                $userId = Auth::id();

                // Raw SQL query to select all columns from the ticket_sales table where user_id matches
                $ticketSales = DB::select("SELECT * FROM ticket_sales WHERE user_id = ?", [$userId]);
                
                // Total Bus and seat count process
                $totalBus = Bus::get()->count();

                // Return the data or pass it to a view
                return view('userDashboard.index', ['ticketSales' => $ticketSales, 'totalBus' => $totalBus]);
                
            }
         }
    }

    public function user_list()
    {
        $usersList = User::where('role', 1)->get();
    
        return view('adminDashboard.all_user', ['usersList' => $usersList]);
    }
    public function all_busses()
    {
        $busList = BUS::get();
    
        return view('adminDashboard.all_bus', ['busList' => $busList]);
    }
    public function createBus(Request $request)
{
    // Validate the request data
    $request->validate([
        'coach_name' => 'required|string',
        'bus_type' => 'required|string|in:AC,Non-AC', // Validation for AC and Non-AC
        'total_seats' => 'required|integer',
        // Add other validation rules for your columns
    ]);

    // Create a new bus
    $bus = Bus::create([
        'coach_name' => $request->input('coach_name'),
        'coach_type' => $request->input('bus_type'),
        'total_seats' => $request->input('total_seats'),
        // Add other columns and values
    ]);

    // Redirect with a success message
    return redirect()->route('buses')->with('success', 'Bus created successfully!');
}

//All Stops start
public function busStops()
{
    $busStops = BusStop::get();

    return view('adminDashboard.all_stops', ['busStops' => $busStops]);
}
public function newbusbusStops(Request $request)
{
    //dd($request);
// Validate the request data
$request->validate([
    'name' => 'required|string',

    // Add other validation rules for your columns
]);

// Create a new bus
$bus = BusStop::create([
    'name' => $request->input('name'),
]);

// Redirect with a success message
return redirect()->route('busstops')->with('success', 'Bus Stop created successfully!');
}
// All Stops End

//All Stops start
public function busRoutes()
{
    $busRoutes = BusRoutes::get();

    return view('adminDashboard.all_routes', ['busRoutes' => $busRoutes]);
}
public function newbusroutes(Request $request)
{
    //dd($request);
// Validate the request data
$request->validate([
    'name' => 'required|string',

    // Add other validation rules for your columns
]);

// Create a new bus
$bus = BusStop::create([
    'name' => $request->input('name'),
]);

// Redirect with a success message
return redirect()->route('busstops')->with('success', 'Bus Stop created successfully!');
}
// All Stops End


    public function showDropdown()
    {
        $busStops = BusStop::pluck('name');
    
        return view('index', compact('busStops'));
    }

    public function busView(Request $request)
    {
        // Your logic to handle the form submission goes here

        // You can access form data like this:
        $from = $request->input('from');
        $to = $request->input('to');
        $doj = $request->input('doj');

        $dhakaTime = Carbon::now('Asia/Dhaka');
        // Format the time as 'H:i:s'
        $formattedDhakaTime = $dhakaTime->format('H:i:s');
       //dd($formattedDhakaTime);

        $busInfoResults = DB::table('buses')
        ->join('bus_fares', 'buses.id', '=', 'bus_fares.bus_id')
        //->join('bus_info', 'buses.id', '=', 'bus_info.id') // Adjust based on your actual relationship
        ->where('bus_fares.boarding_point', $from)
        //->where('bus_fares.boarding_time', $formattedDhakaTime)
        ->where('bus_fares.dropping_point', $to)
        ->select('buses.*', 'bus_fares.*')
        ->get();
        // Seats Available
        $total_ticket_sold = DB::table('ticket_sales')
        ->where('doj', $doj)
        ->sum('seat');

//dd ( $busInfoResults);
         $total_no = $busInfoResults->count();

         return view('bus_view', compact('busInfoResults', 'total_no', 'from', 'to', 'doj','total_ticket_sold'));
    }

    public function processPurchase(Request $request)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $user_id=Auth()->user()->id;
            $from = $request->input('from');
            $to = $request->input('to');
            $doj = $request->input('doj');
            $bus_id = $request->input('bus_id');
            $coach_name = $request->input('coach_name');
            $coach_type = $request->input('coach_type');
           
            $available_seat= $request->input('available_seat');
            $boarding_point = $request->input('boarding_point');
            $dropping_point = $request->input('dropping_point');
            $fare = $request->input('fare');
            // If logged in, proceed to checkout
            return view('checkout', compact('user_id','from', 'to', 'doj','bus_id','coach_name','coach_type','boarding_point','dropping_point','fare','available_seat'));
        } else {
            // If not logged in, show a message
            return redirect()->route('bus_view_Notice');
        }
    }
    public function processPurchase_Final(Request $request)
    {
        // Validate the form data
        $request->validate([
            'user_id' => 'required',
            'bus_id' => 'required',
            'from' => 'required',
            'to' => 'required',
            'doj' => 'required',
            'seat' => 'required',
            'fare' => 'required',
            'amount' => 'required',
        ]);

        // Use the DB facade to insert data into the 'ticket_sales' table
        DB::table('ticket_sales')->insert([
            'user_id' => $request->user_id,
            'bus_id' => $request->bus_id,
            'from' => $request->from,
            'to' => $request->to,
            'doj' => $request->doj,
            'seat' => $request->seat,
            'fare' => $request->fare,
            'amount' => $request->amount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Optionally, you can redirect the user to a thank you page or another page
        return redirect()->route('dashboard');
    }

    public function print_pdf($id){
        $ticket_sales=DB::table('ticket_sales')->find($id);

        $pdf=PDF::loadView('admin.pdf',compact('ticket_sales'));

        return $pdf->download('Green-Line.pdf');
    }
    
}
