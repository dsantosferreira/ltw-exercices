<?php
    function getTimeInterval(int $timestamp) : string {
        $now = time();
        $interval = $now - $timestamp;

        if ($interval < 60) {
            return strval($interval) . 's';
        }
        else if ($interval < 60*60) {
            return strval(floor($interval/60)) . 'm';
        }
        else if ($interval < 60*60*24) {
            return strval(floor($interval/(60*60))) . 'h';
        }
        else if ($interval < 60*60*24*30) {
            return strval(floor($interval/(60*60*24))) . 'd';
        }
        else if ($interval < 60*60*24*30*12) {
            return strval(floor($interval/(60*60*24*30))) . 'm';
        }
        else {
            return strval(floor($interval/(60*60*24*30*12))) . 'y';
        }
    }
?>