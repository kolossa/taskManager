<html>
	<body>
	
	<h2>Task List</h2>
	
		<div>
			<a href="{!! url('task-manager/create'); !!}">create new task</a>
		</div>
		
		<table>
			<tr>
				<th>id</th>
				<th>title</th>
				<th>content</th>
				<th>status</th>
				<th>userId</th>
				<th>created</th>
				<th>updated</th>
				<th></th>
				<th></th>
			</tr>
			
			@foreach ($result as $task)
				<tr>
					<td>{{$task->getId()}}</td>
					<td>{{$task->getTitle()}}</td>
					<td>{{$task->getContent()}}</td>
					<td>{{$task->getStatus()}}</td>
					<td>{{$task->getUserId()}}</td>
					<td>{{$task->getCreatedAt()}}</td>
					<td>{{$task->getUpdatedAt()}}</td>
					<td>
						<a href="{!! url('task-manager/view', ['id'=>$task->getId()]); !!}">view</a>
					</td>
					<td><a href="{!! url('task-manager/update', ['id'=>$task->getId()]); !!}">edit</a></td>
				</tr>
			@endforeach
			
		</table>
		
		
		
		
		
		
		
		
		
	</body>
</html>