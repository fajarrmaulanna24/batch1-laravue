<html>
<head>
<title>Tambah Pengarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<?php
	ob_start();
	include_once("connect.php");
	$id = $_GET['id'];

	$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarangs WHERE id='$id'");

    while($pengarang_data = mysqli_fetch_array($pengarang))
    {
    	$id = $pengarang_data['id'];
		$nama_pengarang = $pengarang_data['nama_pengarang'];
		$email = $pengarang_data['email'];
		$telp = $pengarang_data['telp'];
		$alamat = $pengarang_data['alamat'];

    }
?>
 
<body>
<div class="container jumbotron">
	<a href="index.php"><button class="btn btn-primary mt-4 mb-2">Go to Home</button></a>
 

<div class="card text-center">
  <div class="card-header">
    Edit Pengarang
  </div>
  <div class="card-body">
	<form action="edit.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" class="table table-striped" border="0">
			<tr> 
				<td>ID</td>
				<td style="font-size: 11pt;"><?php echo $id; ?> </td>
			</tr>
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>" required></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>" required></td>
			</tr>
			<tr> 
				<td>Telepon</td>
				<td><input type="text" name="telp" value="<?php echo $telp; ?>" required></td>		
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class = "btn btn-success" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	</div>
  <div class="card-footer text-muted">
	  Terimakasih
  </div>
</div>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id = $_GET['id'];
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE pengarangs SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id = '$id';");
			
			header("Location:index.php");
		}
	?>
</div>
</body>
</html>