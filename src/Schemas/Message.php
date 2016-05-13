<?php

namespace FNVi\Messaging\Schemas;
use FNVi\Mongo\Schema;
use MongoDB\BSON\ObjectID;

/**
 * Represents a message to one or more users in the messages collection
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class Message extends Schema{
    
    public $body;
    public $users = [];
    public $seen = [];
    public $sender;
    public $conversation;
    public $timestamp;


    /**
     * 
     * @param mixed $sender
     * @param ObjectID $conversation
     * @param mixed $body
     */
    public function __construct($sender, $conversation, $body, $to) {
        $this->sender = $sender;
        $this->body = $body;
        $this->conversation = $conversation;
        $this->timestamp = $this->timestamp();
        $to[] = $sender;
        $this->users = $to;
        parent::__construct();
    }
}
