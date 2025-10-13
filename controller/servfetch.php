<?php
require_once("../model/serviceModel.php");
$event = getUpcomingEvents();

foreach($event as $event)
{
    echo "<tr>";
    echo "<td>".$event['event_id']."</td>";
    echo "<td>".htmlspecialchars($event['event_type'])."</td>";
    echo "<td>".htmlspecialchars($event['event_status'])."</td>";
    echo "<td>".$event['event_price']."</td>";
    echo "</tr>";
}
?>