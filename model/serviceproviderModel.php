<?php
require_once("database.php");

function  addService($service_provider_id, $service_type, $service_price)
{
    $conn =getConnection();
    $sql="INSERT INTO service_table (service_provider_id, service_type, service_price) VALUES ( '$service_provider_id', '$service_type', '$service_price')";
    $status=mysqli_query($conn,$sql);
    mysqli_close($conn);
    return $status;
}

function getServices($service_provider_id)
{
    $conn = getConnection();
    $sql = "SELECT * FROM service_table WHERE service_provider_id='{$service_provider_id}'";
    $result = mysqli_query($conn, $sql);
    $services = [];
    while($row = mysqli_fetch_assoc($result))
    {
        $services[] = $row;
    }
    return $services;
}
function updateService($service_id, $service_type, $service_price)
{
    $conn = getConnection();
    $sql = "UPDATE service_table SET service_type='{$service_type}', service_price='{$service_price}'
            WHERE service_id='{$service_id}'";
    $status = mysqli_query($conn, $sql);
    if(!$status) echo "Error: ".mysqli_error($conn);
    return $status;
}
function deleteService($service_id)
{
    $conn = getConnection();
    $sql = "DELETE FROM service_table WHERE service_id='{$service_id}'";
    $status = mysqli_query($conn, $sql);
    if(!$status) echo "Error: ".mysqli_error($conn);
    return $status;
}

function getUpcomingEvents()
{
    $conn =getConnection();
    $sql="SELECT * FROM event_table WHERE event_status='booked'";
    $result=mysqli_query($conn,$sql);
    $events=[];
    while($row=mysqli_fetch_assoc($result))
    {
        $events[]=$row;

    }
    return $events;
}

function addTask($service_provider_id, $event_id, $task_description)
{
    $conn =getConnection();
    $sql="INSERT INTO task_table (service_provider_id, event_id, task_description) VALUES ( '$service_provider_id', '$event_id', '$task_description')";
    $status=mysqli_query($conn,$sql);
    mysqli_close($conn);
    return $status;
}
function deleteTask($task_id,$service_provider_id)
{
    $conn =getConnection();
    $sql="DELETE FROM service_provider_task WHERE task_id='$task_id' AND service_provider_id='$service_provider_id'";
    $status=mysqli_query($conn,$sql);
    mysqli_close($conn);
    return $status;
}

function getProviderTasks($service_provider_id)
{
    $conn =getConnection();
    $sql="SELECT * FROM task_table WHERE service_provider_id='$service_provider_id'";
    $result=mysqli_query($conn,$sql);
    $tasks=[];
    while($row=mysqli_fetch_assoc($result))
    {
        $tasks[]=$row;

    }
    return $tasks;
}
?> 