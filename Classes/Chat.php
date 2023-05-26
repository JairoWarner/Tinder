<?php
class Chat {
    public $chatId;
    public $matchId;
    public $senderId;
    public $receiverId;
    public $message;
    public $timestamp;


    public function __construct($chatId, $matchId, $senderId, $receiverId, $message, $timestamp) {
        $this->chatId = $chatId;
        $this->matchId = $matchId;
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
        $this->message = $message;
        $this->timestamp = $timestamp;
    }

    //Create
    public function sendMessage($message) {
        // Code to store the message in a file or database
    }

    //Read
    public function readMessage($message) {
        //code to show messages
    }

    


}
?>
