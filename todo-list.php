<?php
$sql = "SELECT * FROM `todo` ORDER BY id desc";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)){
	while($row = mysqli_fetch_assoc($query)){
		$style = "";
		if($row['is_done']==1){
			$style = 'style="background-color:blue;"';
		}
?>
		<div class="input-group mt-5">
			<div class="input-group-prepend">
				<div class="input-group-text">
					<input type="checkbox" <?php if($row['is_done']==1){ echo "checked"; } ?> onclick="updateOnDone(<?php echo $row['id']; ?>)">
				</div>
			</div>
			<input class="form-control" type="text" value="<?php echo $row['todo']; ?>" <?php echo $style; ?> onchange="updateNewToDo(<?php echo $row['id']; ?>,$(this).val())">
			<button class="btn btn-outline-secondary" type="button" onclick="deleteToDo(<?php echo $row['id']; ?>)">Delete</button>
		</div>
<?php
	}
}
?>