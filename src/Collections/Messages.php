<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FNVi\Messaging\Collections;
use FNVi\Mongo\Collection;
use FNVi\Messaging\Schemas\Message;
use MongoDB\BSON\ObjectID;
/**
 * Description of Messages
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class Messages extends Collection{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insertOne(Message $document, $options = array()) {
        if(!$document->conversation)
        {
            $document->conversation = new ObjectID();
        }
        if($document->conversation && !$document->users){
            $document->users = $this->getUsers($document->conversation);
        }
        parent::insertOne($document, $options);
    }
    
    public function getUsers(ObjectID $conversation){
        $lastMessage = $this->collection->findOne(["conversation"=>$conversation]);
        return $lastMessage->users;
    }
}
