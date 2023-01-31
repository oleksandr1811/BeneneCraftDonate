<?php
    $nick  = $_REQUEST['nick'];
    $group = $_REQUEST['group'];
		echo $Engine->buy_price($nick, $group);