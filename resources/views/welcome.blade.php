<html>
	<head>
		<title>API</title>
		
		<link href="http://libs.useso.com/js/bootstrap/3.2.0/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<h1>API Test</h1>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Method Name</th>
						<th>URL</th>
						<th>Parameter</th>
						<th>Result</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>获取 Access Token</td>
						<td>post /oauth/access_token</td>
						<td>grant_type:password<br>username:admin@admin.com<br>password:admin<br>client_id:id<br>client_secret:secret</td>
						<td>access_token<br>token_type<br>expires_in<br>refresh_token</td>
					</tr>
					<tr>
						<td>获取 User List</td>
						<td>get: /user</td>
						<td>access_token</td>
						<td>JSON</td>
					</tr>
					<tr>
						<td>获取 User</td>
						<td>get: /user/{$id}</td>
						<td>access_token</td>
						<td>JSON</td>
					</tr>
					<tr>
						<td>创建 User</td>
						<td>post: /user/</td>
						<td>mail<br>email<br>password<br></td>
						<td>JSON</td>
					</tr>
					<tr>
						<td>修改 User</td>
						<td>put: /user/{$id}</td>
						<td>mail<br>email<br>password<br></td>
						<td>JSON</td>
					</tr>
					<tr>
						<td>删除 User</td>
						<td>delete: /user/{$id}</td>
						<td>access_token</td>
						<td>JSON</td>
					</tr>
				</tbody>
			</table>
			
		</div>
	</body>
</html>
