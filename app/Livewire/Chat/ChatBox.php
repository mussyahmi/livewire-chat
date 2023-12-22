<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use Livewire\Component;
use App\Notifications\MessageRead;
use App\Notifications\MessageSent;

class ChatBox extends Component
{
    public $selectedConversation;
    public $body;
    public $loadedMessages;
    public $paginate_var = 10;

    protected $listeners = ['load-more' => 'loadMore'];

    public function getListeners()
    {
        $auth_id = auth()->user()->id;

        return [
            'load-more',
            "echo-private:users.{$auth_id},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'broadcastedNotifications'
        ];
    }
    
    public function render()
    {
        return view('livewire.chat.chat-box');
    }

    public function mount()
    {
        $this->loadMessages();
    }

    public function sendMessage()
    {
        $this->validate(['body' => 'required|string']);

        $createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->selectedConversation->getReceiver()->id,
            'body' => $this->body
        ]);

        $this->reset('body');

        #push the message
        $this->loadedMessages->push($createdMessage);

        #update conversation model
        $this->selectedConversation->updated_at = now();
        $this->selectedConversation->save();

        #scroll to bottom
        $this->dispatch('scroll-bottom');

        #refresh chatlist
        $this->dispatch('refresh-chat-list');

        #broadcast
        $this->selectedConversation->getReceiver()
            ->notify(new MessageSent(
                Auth()->User(),
                $createdMessage,
                $this->selectedConversation,
                $this->selectedConversation->getReceiver()->id
            )
        );
    }

    public function loadMessages()
    {
        #get count
        $count = Message::where('conversation_id', $this->selectedConversation->id)->count();

        #skip and query
        $this->loadedMessages = Message::where('conversation_id', $this->selectedConversation->id)
                                    ->skip($count - $this->paginate_var)
                                    ->take($this->paginate_var)
                                    ->get();

        return $this->loadedMessages;
    }

    public function loadMore(): void
    {
        #increment 
        $this->paginate_var += 10;

        #call loadMessages()
        $this->loadMessages();

        #update the chat height 
        $this->dispatch('update-chat-height');
    }

    public function broadcastedNotifications($event)
    {
        if ($event['type'] == MessageSent::class) {
            if ($event['conversation_id'] == $this->selectedConversation->id) {
                $this->dispatch('scroll-bottom');

                $newMessage = Message::find($event['message_id']);

                #push message
                $this->loadedMessages->push($newMessage);

                #mark as read
                $newMessage->read_at = now();
                $newMessage->save();

                #broadcast 
                $this->selectedConversation->getReceiver()
                    ->notify(new MessageRead($this->selectedConversation->id));
            }
        }
    }
}
