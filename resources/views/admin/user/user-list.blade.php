<?php $userDatas = json_decode($usersData);  ?>
<table>
	<tr class="row">
		<tr class="row">
			<th class="col-md-4 text-center">User Data</th>
			<th class="col-md-4 text-center">User Data</th>
			<th class="col-md-4 text-center">User Data</th>
		</tr>
		<tr class="col-md-12">
			<th class="col-md-2">Id</th>
			<th class="col-md-2">Name</th>
			<th class="col-md-2">Email</th>
			<th class="col-md-2">Password</th>
			<th class="col-md-2">Updated</th>
			<th class="col-md-2">Created</th>
		</tr>
		@foreach($userDatas as $userData)
		<tr class="col-md-12">
			<td class="col-md-2">{{ $userData->id }}</td>
			<td class="col-md-2">{{ $userData->name }}</td>
			<td class="col-md-2">{{ $userData->email }}</td>
			<td class="col-md-2">{{ $userData->terms_condition }}</td>
			<td class="col-md-2">{{ $userData->created_at }}</td>
			<td class="col-md-2">{{ $userData->updated_at }}</td>
		</tr>
		@endforeach
	</tr>
	
</table>
