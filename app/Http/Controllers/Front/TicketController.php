<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;
use App\Models\TicketCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Notifications\NewTicketNotification;
use App\Notifications\NewTicketReplyNotification;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets  = Ticket::whereUserId(auth()->id())->latest()->get();
        return view('ticket.index',compact('tickets'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ticketCategories  = TicketCategory::latest()->get();
        return view('ticket.create',compact('ticketCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::create($request->validated());
        $adminUser = User::where('is_admin', true)->first(); 
        if ($adminUser) {
            $adminUser->notify(new NewTicketNotification($ticket));
        }
        session()->flash('success','your ticket has been submitted , we will reply soon');
        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(request()->has('notification_id')) markSingleNotificationsAsRead(request()->get('notification_id'),$with_notify=false);
        $ticket = Ticket::with('category')->with('replies')->whereUserId(auth()->id())->findOrFail($id);
        return view('ticket.show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function ticketReply(Request $request,string $id)
    {
            $this->validate($request,[
                'message'=>'required|min:3|max:300|string'
            ]);
            $reply = TicketReply::create([
                'message'=> $request->message,
                'ticket_id'=>$id,
                'user_id'=>auth()->id()
            ]);
            $adminUser = User::where('is_admin', true)->first(); 
            if ($adminUser) {
                $adminUser->notify(new NewTicketReplyNotification($reply));
            }
            return back();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
