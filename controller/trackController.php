<?php 
session_start();
require_once("../model/serivceModel.php")
header('Content-Type: application/json');
if(!isset($_SESSION["username"]) || $_SESSION["role"] !=2)
{
    echo json_encode(['status'=>o, 'msg'=>'Not authorized']);
    exit();
}
$service_provider_id=$_SESSION["user_id"];
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add')
{
    $event_id = intval($_POST['event_id']);
    $task_description = trim($_POST['task_description']);

    if($task_description == '') {
        echo json_encode(['status'=>0, 'msg'=>'Task cannot be empty']);
        exit();
    }

    $ok = addTask($service_provider_id, $event_id, $task_description);
    if($ok) echo json_encode(['status'=>1, 'msg'=>'Task added']);
    else echo json_encode(['status'=>0, 'msg'=>'Failed to add']);
    exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete')
{
    $task_id = intval($_POST['task_id']);
    $ok = deleteTask($task_id, $service_provider_id);
    if($ok) echo json_encode(['status'=>1, 'msg'=>'Task deleted']);
    else echo json_encode(['status'=>0, 'msg'=>'Failed to delete']);
    exit();
}

echo json_encode(['status'=>0, 'msg'=>'Invalid request']);
exit();
?>