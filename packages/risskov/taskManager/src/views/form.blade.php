<html>
	<body>
	
		<h2>Task</h2>
	
		<form method="POST">
			@csrf

			<div>
				<label for="task[title]">Title</label>
				<input id="title" name="task[title]" type="text" value="{{$taskDTO->getTitle()}}" >
			</div>
			
			<div>
				<label for="task[content]">Content</label>
				<textarea rows = "5" cols = "50" name = "task[content]", id="content">{{$taskDTO->getContent()}}</textarea>
			</div>
			
			<div>
				<label for="task[status]">status</label>
				 <select name="task[status]">
					@foreach (Risskov\TaskManager\Model\Entities\Task::getStatusLabels() as $value=>$label)
						<option value={{$value}} 
							@if ($taskDTO->getStatus()==$value) 
								selected 
							@endif 
						>{{$label}}</option>
					@endforeach
				</select> 
			</div>
			
			<div>
				<input type="submit" value="Submit">
			</div>
		</form>
	</body>
</html>