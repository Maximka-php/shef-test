<?php

class Mail
{
    public $arr_emails;
    public $color_font;
    public $tema;
    public $message;

    public function __construct($list_emails, $color)
    {
        $this->arr_emails = $this->find_arr_email($list_emails);
        $this->color_font = $color;
        $this->tema = Message::find_tema();
        $this->message = $this->full_message();
    }

    function find_arr_email($list_emails)
    {
        $arr = explode(',', $list_emails);
        $new_arr = [];
        foreach ($arr as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $new_arr[] = $email;
            } else {
                die('Неправильный формат email');
            }
        }
        return $this->arr_emails = $new_arr;
    }

    function send()
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
        foreach ($this->arr_emails as $to) {
            mail($to, $this->tema, $this->message, $headers);
            $count += 1;
        }
        if ($count == count($this->arr_emails)) {
            echo "Письма отправлены успешно<br>
                  Всего  " . $count . "  писем(письма)";
        }
    }

    function full_message()
    {
        $contact = Message::find_signature();
        $message = "<html><head><style> div,a{color:" . $this->color_font . ";}</style></head>";
        $message .= Message::find_message();
        $message .= '<body><div>';
        $message .= '<p>---------------------</p>';
        $message .= '<p>С уважением,</p>';
        $message .= "<p>" . $contact['User1']['fio'] . "</p>";
        $message .= '<p>Телефон:</p>';
        $message .= "<p><a href='test.php?phone=" . $contact['User1']['phone']['0'] . "' >" . $contact['User1']['phone']['0'] . "</a></p>";
        $message .= "<p><a href='test.php?phone=" . $contact['User1']['phone']['1'] . "' >" . $contact['User1']['phone']['1'] . "</a></p>";
        $message .= '<p>Email:</p>';
        $message .= "<p><a href='test.php?mail=" . $contact['User1']['mail']['0'] . "' >" . $contact['User1']['mail']['0'] . "</a></p>";
        $message .= "<p><a href='test.php?mail=" . $contact['User1']['mail']['1'] . "' >" . $contact['User1']['mail']['1'] . "</a></p>";
        $message .= '</div></body></html>';

        return $message;

    }
}