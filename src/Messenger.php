<?php
namespace FNVi\Messaging;
use FNVi\Messaging\Schemas\Message;
use FNVi\Messaging\Collections\Messages;
use FNVi\Mongo\Tools\Aggregate;
/**
 * Description of Messenger
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class Messenger {
    
    /**
     *
     * @var Messages
     */
    private $messages;
    private $user;
    
    public function __construct($user) {
        $this->user = $user;
        $this->messages = new Messages();
    }
    
    public function sendMessage($body, $conversation = null, $to = null){
        $this->messages->insertOne(new Message($this->user, $conversation, $body, $to));
        
    }
    
    public function getMessages($conversation, $count = 10){
        return $this->messages->find(["conversation" => $conversation, "users"=>$this->user], ["limit" => $count, "sort"=>["timestamp"=>-1]]);
    }
    
    public function getConversationList(){
        return (new Aggregate($this->messages))
                ->match(["users"=>$this->user])
                ->execute();
    }
}
