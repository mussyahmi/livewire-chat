<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use Livewire\Component;

class ChatList extends Component
{
    public $query;
    public $selectedConversation;

    protected $listeners = ['refresh-chat-list' => '$refresh'];

    public function render()
    {
        $user = auth()->user();

        return view('livewire.chat.chat-list', ['conversations' => $user->conversations()->latest('updated_at')->get()]);
    }

    public function deleteByUser($id) {
        $userId = auth()->id();
        $conversation = Conversation::find(decrypt($id));
    
        $conversation->messages()->each(function($message) use ($userId) {
            if ($message->sender_id === $userId) {
                $message->update(['sender_deleted_at' => now()]);
            } elseif ($message->receiver_id === $userId) {
                $message->update(['receiver_deleted_at' => now()]);
            }
        });
    
        $receiverAlsoDeleted = $conversation->messages()
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id',$userId);
            })->where(function ($query) use ($userId) {
                $query->whereNull('sender_deleted_at')
                    ->orWhereNull('receiver_deleted_at');
            })->doesntExist();
    
        if ($receiverAlsoDeleted) {
            $conversation->forceDelete();
        }

        return redirect(route('chat.index'));    
    }
}
