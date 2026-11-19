<?php
/*
Use this URL to print data in browser:
http://localhost/main-store/src/list_users.php
*/
include('../settings/database.php');
//Get data from users table
$sql="
select
id,
firstname ||' ' || lastname as fullname,
email,
mobile_phone,
case when status = true then 'Active' else 'Inactive' end as status,
url_photo
from
users
";
$res = pg_query($local_conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign in</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<select>
<option>List all users</option>
<option>List active users only</option>
</select>
<table class="table table-bordered">
<tr>
<th>Photo</th>
<th>Fullname</th>
<th>Email</th>
<th>Mobile phone</th>
<th>Status</th>
<th>Options</th>
</tr>
<?php while($row = pg_fetch_assoc($res)){ ?>
<tr><!-- Here print data from database -->
<td>
<?php if (!empty($row['url_photo'])) { ?>
<img src="<?= $row['url_photo'] ?>" width="40" height="40" style="object-fit: cover; border-radius: 50%;"

alt="user photo profile">
<?php } else { ?>
<!-- Imagen por defecto si no tiene foto -->
<img src="photos/photo_default.png" width="40" height="40" style="object-fit: cover; border-radius:

50%;" alt="default photo">
<?php } ?>
</td>
<td><?= $row['fullname'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['mobile_phone'] ?></td>
<td><?= $row['status'] ?></td>
<td align="center">
<a href="edit_user.php?id=<?php echo $row['id']; ?>">
<img src="icon/edit.png" alt="Edit user" width="20">
</a>
<a href="#">
<img src="icon/search.png" alt="Search user" width="20">
</a>
<a href="delete_user.php?userID=<?= $row['id'] ?>">
<img src="icon/delete.png" alt="Delete user" width="20">
</a>
<a href="update_user_status.php?userID=<?= $row['id'] ?>&userStatus=<?= $row['status'] ?>">
<?php
if($row['status'] == 'Active'){
echo "<img src='icon/disable.png' alt='Inactive user' width='20'>";
}else{
echo "<img src='icon/enable.png' alt='Active user' width='20'>";
}
?>
</a>
</td>
</tr>
<?php } ?>
</table>
<a href="home.php">Go to home</a>
</body>
</html>