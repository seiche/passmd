<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include "#/header.php"; ?>
  </head>
  <body>
		<?php require "#/navbar.php"; ?>
		<section>
			<?php
					require "php/connect.php";
					$fill = isset($_GET['id']);
					$id = (int)$_GET['id'];
					$result = mysql_query("select * from ftp where id=$id");
					if(!$result) $fill = false;
					if(!mysql_num_rows($result)) $fill = false;
					$row = mysql_fetch_array($result);
				?>
				
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title"><?php
					if($fill)
						echo "Edit Account";
					else
						echo "Add new account";
				?></h3>
			  </div>
			  <div class="panel-body">
				<form method="POST" action="php/ftp.php">
				<input type="hidden" name="id" <?php if($fill) echo "value='{$row['id']}'"; ?>/>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>
								<div class="form-group">
									<label>Domain IP</label>
									<input type="text" class="form-control" name="domain" <?php if($fill) echo "value='{$row['domain']}'"; ?> autocomplete="off" placeholder="Enter site name">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label>Type</label>
									<input type="text" class="form-control" name="type" <?php if($fill) echo "value='{$row['type']}'"; ?> autocomplete="off" placeholder="Enter site url">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" name="username" <?php if($fill) echo "value='{$row['username']}'"; ?> autocomplete="off" placeholder="Enter username">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label>Password <a href="javascript:generate()">Generate</a></label>
									<input type="text" class="form-control" id="passwd" name="password" <?php if($fill) echo "value='{$row['password']}'"; ?> autocomplete="off" placeholder="Enter Password">
								</div>
							</td>
						</tr>
						<tr>
						</tr>
						<tr>
							<td>
							</td>
							<td>
								<?php 
									if($fill) 
										echo "<a href='/' class='btn btn-default'>Cancel</a>
										<a href='javascript:remove({$row['id']}, 'ftp')' class='btn btn-default'>Remove</a>
										<input type='submit' class='btn btn-default' value='Save'/>"; 
									else
										echo '<input type="submit" class="btn btn-default" value="Submit"/>';
								?>
							</td>
						</tr>
					</tbody>
				</table>
				</form>
				
			  </div>
			</div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Date</th>
						<th>Domain</th>
						<th>Username</th>
						<th>Password</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
				<?php
					require "php/connect.php";
					
					$sql = "select * from ftp order by domain asc";
					$result = mysql_query($sql);
					while($row = mysql_fetch_assoc($result)){
						echo "<tr>
							<td>{$row['date']}</td>
							<td>{$row['domain']}</td>
							<td>{$row['username']}</td>
							<td>{$row['password']}</td>
							<td><a href='?id={$row['id']}' role='button'>Edit</a></td>
						</tr>";
					}
				?>
				</tbody>
			</table>
		</section>
  </body>
</html>