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
					$result = mysql_query("select * from passwords where id=$id");
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
				<form method="POST" action="php/update.php">
				<input type="hidden" name="id" <?php if($fill) echo "value='{$row['id']}'"; ?>/>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>
								<div class="form-group">
									<label>Site Name</label>
									<input type="text" class="form-control" name="site_name" <?php if($fill) echo "value='{$row['site_name']}'"; ?> autocomplete="off" placeholder="Enter site name">
								</div>
							</td>
							<td>
								<div class="form-group">
									<label>Site Address</label>
									<input type="text" class="form-control" name="site_url" <?php if($fill) echo "value='{$row['site_url']}'"; ?> autocomplete="off" placeholder="Enter site url">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<label>Account Name</label>
									<input type="text" class="form-control" name="account" <?php if($fill) echo "value='{$row['account']}'"; ?> autocomplete="off" placeholder="Enter username">
								</div>
							</td>
							<td rowspan="2">
								<div class="form-group">
									<label>Notes</label>
									<input type="text" class="form-control" name="notes" <?php if($fill) echo "value='{$row['notes']}'"; ?> autocomplete="off" placeholder="PIN number ect.">
								</div>
							</td>
						</tr>
						<tr>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<label>Password <a href="javascript:generate()">Generate</a></label>
									<input type="text" class="form-control" id="passwd" name="password" <?php if($fill) echo "value='{$row['password']}'"; ?> autocomplete="off" placeholder="Enter Password">
								</div>
							</td>
							<td>
								<?php 
									if($fill) 
										echo "<a href='/' class='btn btn-default'>Cancel</a>
										<a href='javascript:remove({$row['id']}, 'passwords')' class='btn btn-default'>Remove</a>
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
						<th>Web Site</th>
						<th>Username</th>
						<th>Password</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
				<?php
					require "php/connect.php";
					
					$sql = "select * from passwords order by site_name asc";
					$result = mysql_query($sql);
					while($row = mysql_fetch_assoc($result)){
						echo "<tr>
							<td>{$row['date']}</td>
							<td><a href='{$row['site_url']}' target='_blank'>{$row['site_name']}</a></td>
							<td>{$row['account']}</td>
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