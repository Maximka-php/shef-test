<?php

if ($_GET['phone']) {
    echo "Позвонить по номеру: " . $_GET['phone'];
}
if ($_GET['mail']) {
    echo "Написать на почту: " . $_GET['mail'];
}