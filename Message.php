<?php

class Message
{
    public $tema;
    public $message;
    public $signature;


    static function find_tema()
    {
        return $tema = 'Тема нашего письма';
    }

    static function find_message()
    {
        return $message = 'Сообщение нашего письма';
    }

    static function find_signature()
    {
        $contact = file_get_contents('contact.json');
        return json_decode($contact, true);
    }


}