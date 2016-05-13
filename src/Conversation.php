<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FNVi\Messaging;
use MongoDB\BSON\ObjectID;
use FNVi\Mongo\Query;
/**
 * Description of Conversation
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class Conversation {
    
    private $currentUser;
    private $conversation;
    private $collection;
    public $messages;
    
    public function __construct($currentUser, ObjectID $conversation) {
        $this->conversation = $conversation;
        $this->currentUser = $currentUser;
        $this->messages = new Query("messages", ["conversation"=>$conversation]);
    }
    
    public function getMessages($limit = 10){
    }
    
    public function sendMessage(){
    }
}
