<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class TicketController extends Controller
{
    public function createTicket(Request $request){
        $request -> validate([
            'subject'=> 'required',
            'description'=> 'required',
            'creator'=> 'required'
        ]);

        Ticket::create([
            'subject'=>$request->subject,
            'description'=>$request->description,
            'creator_id'=>$request->creator,

        ]);
        return redirect()->route('home')->with('message','Ticket added with success!');
    }
    public function addTicket(){
        return view('tickets.addTicket');
    }

    public function allTickets(){
        $tickets=DB::table('tickets')
        ->join('users','users.id','=','tickets.creator_id')
        ->select('tickets.id','tickets.subject','tickets.status as status','tickets.created_at','users.name as creator','tickets.description')
        ->orderBy('tickets.id')
        ->get();

        return view('tickets.allTickets', compact('tickets'));
    }
    public function viewTicket($id){
        $ticket= DB::table('tickets')
        ->where('tickets.id',$id)
        ->join('users','users.id','=','tickets.creator_id')
        ->select('tickets.id','tickets.subject','tickets.status as status','tickets.created_at','users.name as creator','tickets.description')
        ->first();
        $ticketUpdate=DB::table('ticket_updates')
        ->where('ticket_updates.ticket_id',$id)
        ->join('users','users.id','=','ticket_updates.technitian')
        ->select('ticket_updates.id','ticket_updates.ticket_id','ticket_updates.updated_at','users.name as technitian','ticket_updates.description')
        ->orderBy('ticket_updates.id')
        ->get();

        return view('tickets.viewTicket', compact('ticket', 'ticketUpdate'));

    }
    public function updateTicket(Request $request){
        $request -> validate([
            'ticket_id'=> 'required',
            'description'=> 'required',
            'technitian'=> 'required'
        ]);
        DB::table('tickets')->where('tickets.id',$request->ticket_id)->update(['status'=>$request->input('status')]);

        DB::table('ticket_updates')->insert([
            'ticket_id'=>$request->ticket_id,
            'description'=>$request->description,
            'technitian'=>$request->technitian,
            'updated_at'=>now()

        ]);
        return redirect()->route('home')->with('message','Ticket added with success!');
    }
}
