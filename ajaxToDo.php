<?php
include_once 'database.php';

if(isset($_POST['new_todo']) && !empty($_POST['new_todo'])){
	$todo = htmlspecialchars($_POST['new_todo']);
	$created = date("Y-m-d h:i:s");
	$inssql = "INSERT INTO `todo` (todo,created) VALUES('".$todo."','".$created."')";
	$query = mysqli_query($conn,$inssql);

	include 'todo-list.php';
}
if(isset($_POST['done']) && !empty($_POST['done'])){
	$id = htmlspecialchars($_POST['done']);
	$is_done = "";
	// check for done or not
	$doneSql = "SELECT is_done FROM `todo` WHERE id='".$id."'";
	$doneQuery = mysqli_query($conn,$doneSql);
	$doneResult = mysqli_fetch_assoc($doneQuery);

	if($doneResult['is_done']==0){
		$is_done = 1;
	}else{
		$is_done = 0;
	}

	$updSql = "UPDATE `todo` SET is_done='".$is_done."' WHERE id='".$id."'";
	$updQuery = mysqli_query($conn,$updSql);

	include 'todo-list.php';
}
if(isset($_POST['delete']) && !empty($_POST['delete']) && is_numeric($_POST['delete'])){
	$id = htmlspecialchars($_POST['delete']);

	$delSql = "DELETE FROM `todo` WHERE id='".$id."'";
	$delQuery = mysqli_query($conn,$delSql);

	include 'todo-list.php';
}
if(isset($_POST['upd_todo']) && !empty($_POST['upd_todo']) && is_numeric($_POST['upd_todo']) && isset($_POST['upd_newTodo']) && !empty($_POST['upd_newTodo'])){
	$id = htmlspecialchars($_POST['upd_todo']);
	$todo = htmlspecialchars($_POST['upd_newTodo']);

	$updSql = "UPDATE `todo` SET todo='".$todo."' WHERE id='".$id."'";
	$updQuery = mysqli_query($conn,$updSql);

	include 'todo-list.php';
}
?>