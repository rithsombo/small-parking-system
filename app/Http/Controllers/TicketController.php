<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Vihecle;
use App\Models\VihecleBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_register()
    {
        //
        $user = User::all();
        $slot = Slot::all();
        $vehicle_brand = VihecleBrand::all();
        $status = Status::all();

        return view('ticket.ticket_register', compact('user', 'slot', 'vehicle_brand', 'status'));

    }
    public function index()
    {
        $ticket = Ticket::whereIn('status_id', [1])->get()->map(function ($ticket) {
            $brand = VihecleBrand::find($ticket->vehicle_id);
            $ticket->name = $brand ? $brand->name : 'Unknown';

            $slot = Slot::find($ticket->slot_id);
            $ticket->type = $slot ? $slot->type : 'Unknown';


            return $ticket;
        });
        // Count the tickets for each slot type
        $typeCounts = $ticket->groupBy('type')->map(function ($group) {
            return $group->count();
        });

        // Extract counts into separate variables, defaulting to 0 if not present
        $count2Wheels = $typeCounts->get('2wheels', 0);
        $count4Wheels = $typeCounts->get('4wheels', 0);
        $count8Wheels = $typeCounts->get('8wheels', 0);
        return view('ticket.ticket', compact('ticket','count2Wheels','count4Wheels','count8Wheels'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $plate_number = $request->input('plate_num');
        $in_time = now();
        $current_datetime = now()->format('YmdHis');
        $slip_num = substr($plate_number, -3) . $current_datetime;
        $ticket = new Ticket();
        $ticket->slip_num = $slip_num;
        $ticket->plate_num = $plate_number;
        $ticket->vehicle_id = $request->input('vehicle_id');
        $ticket->slot_id = $request->input('slot_id');
        $ticket->user_id = $request->input('user_name');
        $ticket->in_time = $in_time;
        $ticket->status_id=$request->input('status_id');
        $ticket->save();



        return redirect(route('ticket'));
    }

    //checkout

    public function check_out(){
        $check_out = Ticket::whereIn('status_id', [2, 3])->get()->map(function ($ticket) {
            $brand = VihecleBrand::find($ticket->vehicle_id);
            $ticket->brand_name = $brand ? $brand->name : 'Unknown';

            $slot = Slot::find($ticket->slot_id);
            $ticket->type = $slot ? $slot->type : 'Unknown';

            $status = Status::find($ticket->status_id);
            $ticket->name = $status ? $status->name : 'Unknown';

            return $ticket;
        });

        return view('checkout.checkout', compact('check_out'));
    }
    public function check_out_form(Request $request)
    {
        $statuses = Status::all();
        $slipNum = $request->input('slip_num');
        $ticket = Ticket::where('slip_num', $slipNum)->first();
        $current_datetime = now();
        if ($ticket) {
            $brand = VihecleBrand::find($ticket->vehicle_id);
            $ticket->name = $brand ? $brand->name : 'Unknown';
            $slot = Slot::find($ticket->slot_id);
            $ticket->type = $slot ? $slot->type : 'Unknown';
            $status = Status::find($ticket->status_id);
            $ticket->status_name = $status ? $status->name : 'Unknown';
            $pricePerHour = [
                '4wheels' => 0.5,
                '2wheels' => 0.25,
                '8wheels' => 1,
            ];
            $inTime = Carbon::parse($ticket->in_time);
            $durationInHours = $inTime->diffInHours($current_datetime);
            if($durationInHours>0){
                $ticket->sub_price = $durationInHours * ($pricePerHour[$ticket->type] ?? 0);
            }
            else{
                $ticket->sub_price = $pricePerHour[$ticket->type];
            }
            // Default to 0 if type not found in map
            $ticket->duration = $durationInHours;
        }
        return view('checkout.checkoutform', ['ticket' => $ticket,'currentTime' => $current_datetime,'statuses'=>$statuses]);
    }
    public function update_ticket(Request $request)
    {
        $slipNum = $request->input('slip_num');
        $sub_price = $request->input('sub_price');
        $status = $request->input('status_id');
        $ticket = Ticket::where('slip_num', $slipNum)->first();
        if ($ticket) {
            $inTime = Carbon::parse($ticket->in_time);
            $outTime = now();
            $durationInHours = $inTime->diffInHours($outTime);
            $pricePerHour = [
                '4wheels' => 0.5,
                '2wheels' => 0.25,
                '8wheels' => 1,
            ];

            $ticket->out_time = $outTime;
            $ticket->duration = $durationInHours;
            $ticket->status_id = $status;
            $ticket->sub_price = $sub_price;
            $ticket->save();
        }
        return redirect()->route('checkout');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function history(Request $request)
    {
        //
        $check_out = Ticket::all()->map(function ($ticket) {
            $brand = VihecleBrand::find($ticket->vehicle_id);
            $ticket->brand_name = $brand ? $brand->name : 'Unknown';

            $slot = Slot::find($ticket->slot_id);
            $ticket->type = $slot ? $slot->type : 'Unknown';

            $status = Status::find($ticket->status_id);
            $ticket->name = $status ? $status->name : 'Unknown';

            return $ticket;
        });

        return view('history', compact( 'check_out', ));

    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
