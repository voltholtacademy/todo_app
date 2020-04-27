<?php include_once 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Todo App</title>
	<!-- Bootstrap-CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- JQuery-CDN -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
</head>
<body>
	<div class="container">
		<div class="input-group mt-5">
			<input class="form-control" type="text" placeholder="To Do" id="todo" required="required">

			<div class="input-group-append">
				<button class="btn btn-outline-secondary" type="button" id="button-todo">Add</button>
			</div>
		</div>

		<!-- here's list occurs -->
		<div class="list-todo">
			<!-- list-file included -->
			<?php include_once 'todo-list.php'; ?>
		</div>
	</div>

	<!-- function of app -->
	<script type="text/javascript">
		$("#button-todo").on('click',function(){
			var todo = $("#todo").val();
			$.ajax({
				url: "ajaxToDo.php",
				data: {new_todo:todo},
				type: "POST",
				success: function(response){
					$(".list-todo").html(response);
					$("#todo").val("");
				}
			});
		});

		function updateOnDone(val){
			$.ajax({
				url: "ajaxToDo.php",
				data: {done:val},
				type: "POST",
				success: function(response){
					$(".list-todo").html(response);
					$("#todo").val("");
				}
			});
		}

		function deleteToDo(val){
			$.ajax({
				url: "ajaxToDo.php",
				data: {delete:val},
				type: "POST",
				success: function(response){
					$(".list-todo").html(response);
					$("#todo").val("");
				}
			});
		}

		function updateNewToDo(val,new_todo){
			$.ajax({
				url: "ajaxToDo.php",
				data: {upd_todo:val,upd_newTodo:new_todo},
				type: "POST",
				success: function(received){
					$(".list-todo").html(received);
				}
			});
		}
	</script>

	<!-- Bootstrap-JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>