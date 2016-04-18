<?php

namespace Community\Http\Controllers;

use Community\User;
use Carbon\Carbon;
use Community\Message;
use Community\Participant;
use Community\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MessagesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $currentUserId = Auth::user()->id;              
        // All threads that user is participating in
        $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();
        return view('messages.index', compact('threads', 'currentUserId'));
    }

    public function show($id) {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        // don't show the current user in list
        $userId = Auth::user()->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        return view('messages.show', compact('thread', 'users'));
    }

    public function create() {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('messages.create', compact('users'));
    }

    public function sendmessage($user) {
        $as__users = Thread::where('subject', $user)->take(1)->get();
        if (count($as__users) > 0) {
            return redirect('messages/sendmessageshow/' . $as__users[0]->id);
        } else {
            $thread = Thread::create(
                            [
                                'subject' => $user,
                            ]
            );
            return redirect('messages/sendmessageshow/' . $thread->id);
        }
    }

    public function sendmessageshow($id) {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        // don't show the current user in list
        $userId = Auth::user()->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        return view('messages.sendmessageshow', compact('thread', 'users'));
    }

    // Stores a new message thread.
    public function store() {
        $input = Input::all();
        $thread = Thread::create(
                        [
                            'subject' => $input['subject'],
                        ]
        );
        // Message
        Message::create(
                [
                    'thread_id' => $thread->id,
                    'user_id' => Auth::user()->id,
                    'body' => $input['message'],
                ]
        );
        // Sender
        Participant::create(
                [
                    'thread_id' => $thread->id,
                    'user_id' => Auth::user()->id,
                    'last_read' => new Carbon,
                ]
        );
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipants($input['recipients']);
        }
        return redirect('messages');
    }

    // Add new Message to thread
    public function update($id) {

        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create(
                [
                    'thread_id' => $thread->id,
                    'user_id' => Auth::id(),
                    'body' => Input::get('message'),
                ]
        );
        // Add replier as a participant
        $participant = Participant::firstOrCreate(
                        [
                            'thread_id' => $thread->id,
                            'user_id' => Auth::user()->id,
                        ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipants(Input::get('recipients'));
        }

        if (Input::get('sendmessageshow')) {
            return redirect('messages/sendmessageshow/' . $id);
        }

        return redirect('messages/' . $id);
    }

}
