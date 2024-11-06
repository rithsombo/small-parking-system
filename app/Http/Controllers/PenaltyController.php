<?php

namespace App\Http\Controllers;

use App\Models\Penalty;
use App\Models\Slot;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use App\Models\VihecleBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penalty = Penalty::all();
        return view('penalty.penaltyform', compact('penalty'));
    }
    public function check_out_penalty(Request $request)
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
            $ticket->sub_price = $durationInHours * ($pricePerHour[$ticket->type] ?? 0); // Default to 0 if type not found in map
            $ticket->duration = $durationInHours;
        }
        return view('penalty.penalty', ['ticket' => $ticket,'currentTime' => $current_datetime,'statuses'=>$statuses]);
    }
    public function penalty_ticket(Request $request)
    {
        // Validate request inputs
        $request->validate([
            'slip_num' => 'required|string',
            'plate_num' => 'required|string',
            'sub_price' => 'required|numeric',
            'status_id' => 'required|integer',
            'customerID' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'vehicleID' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Retrieve the slip number, price, and status
        $slipNum = $request->input('slip_num');
        $sub_price = $request->input('sub_price');
        $status = $request->input('status_id');
        $ticket = Ticket::where('slip_num', $slipNum)->first();

        // If ticket is found, update its information
        if ($ticket) {
            $inTime = Carbon::parse($ticket->in_time);
            $outTime = now();
            $durationInHours = $inTime->diffInHours($outTime);

            $ticket->out_time = $outTime;
            $ticket->duration = $durationInHours;
            $ticket->status_id = $status;
            $ticket->sub_price = $sub_price;
            $ticket->save();
        }

        // Create a new Penalty object and assign values
        $penalty = new Penalty();
        $penalty->slip_num = $slipNum;
        $penalty->plate_num = $request->input('plate_num');

        // Handle customer ID image upload
        if ($request->hasFile('customerID')) {
            $imageName = time().'.'.$request->customerID->extension();
            $request->customerID->move(public_path('photo'), $imageName);
            $penalty->id_card = $imageName;
        }
        if ($request->hasFile('vehicleID')) {
            $imageName = time().'hery.'.$request->vehicleID->extension();
            $request->vehicleID->move(public_path('photo'), $imageName);
            $penalty->vehicle_id = $imageName;
        }

        // Save the penalty and handle any potential errors
        try {
            if ($penalty->save()) {
                return redirect()->route('penalty')->with('success', 'Penalty ticket created successfully.');
            } else {
                return redirect()->route('penalty')->with('error', 'Failed to create penalty ticket.');
            }
        } catch (\Exception $e) {
            return redirect()->route('penalty')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penalty $penalty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penalty $penalty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penalty $penalty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penalty $penalty)
    {
        //
    }
}
