<?php
$items = array();
foreach($timesheetTimes as $key => $value) {
	$items[$key] = $value;
}
echo $this->Js->object($items);
?>