<?php
// Khởi tạo mảng tài khoản
$errors = null;

if (isset($_POST['register'])) {
	$username = $_POST['username'];
	$passw = trim($_POST['passw']);
	$name = trim($_POST['name']);
	$repassw = trim($_POST['repassw']);
	$email = trim($_POST['email']);
	$gender = $_POST['gender'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];

	if ($passw !== $repassw) {
		$errors = "Mật khẩu nhập lại không khớp!";
	} else if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
		$errors = "Email không đúng!";
	} else {
		$errors = "Gửi thành công";
	}


	echo "<script>console.log('Console: " . $passw === $repassw . "' );</script>";
}

if (isset($_POST['reset'])) {
	$username = '';
	$passw = '';
	$name = '';
	$repassw = '';
	$email = '';
	$gender = '';
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>index</title>
	<meta charset="utf-8">
	<link href="./css/register.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="main">
		<form action="" method="POST" role="form" class="form-container">
			<div class='form-info-input'>
				<div class="form-title-container">
					<?php
					const FORM_TITLE = ['Họ và tên người dùng*:', 'Tên đăng nhập*:', 'Mật khẩu*:', 'Nhập lại mật khẩu*:', 'Email*:', 'Giới tính*:', 'Sở thích: ', 'Năm sinh: ', 'Địa chỉ:'];

					for ($i = 0; $i < count(FORM_TITLE); $i++) {
						echo '<div class="form-title">' . FORM_TITLE[$i] . '</div>';
					}
					?>
				</div>
				<div class="form-input-container">
					<input type="text" value="<?php if (isset($name)) {
						echo $name;
					} ?>" required name="name">
					<input type="text" value="<?php if (isset($username)) {
						echo $username;
					} ?>" required name="username">
					<input type="text" value="<?php if (isset($passw)) {
						echo $passw;
					} ?>" required name="passw">
					<input type="text" value="<?php if (isset($repassw)) {
						echo $repassw;
					} ?>" required name="repassw">
					<input type="text" value="<?php if (isset($email)) {
						echo $email;
					} ?>" required name="email">

					<div class="form-radio-container">
						<input name="gender" checked required type="radio" value="nam"> Nam
						<input name="gender" required type="radio" value="nữ"> Nữ
					</div>

					<div class="form-checkbox-container">
						<input type="checkbox" name="hobby[]" value="choi"> Chơi
						<input type="checkbox" name="hobby[]" value="dibo"> Đi bộ
						<input type="checkbox" name="hobby[]" value="dulich"> Du lịch
						<input type="checkbox" name="hobby[]" value="khac"> Khác

					</div>

					<div class="form-select-container">
						Ngày <select name="day">
							<?php
							for ($i = 1; $i <= 31; $i++) {
								echo "<option value=\"$i\">$i</option>";
							}
							?>
						</select>

						Tháng <select name="month">
							<?php
							$months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
							foreach ($months as $month) {
								$month_number = date('m', strtotime($month));
								echo "<option value=\"$month_number\">$month</option>";
							}
							?>
						</select>

						Năm <select name="year">
							<?php
							$start_year = date("Y");
							$end_year = $start_year - 100;
							for ($i = $start_year; $i >= $end_year; $i--) {
								echo "<option value=\"$i\">$i</option>";
							}
							?>
						</select>

					</div>

					<textarea name="address" rows="4"></textarea>
				</div>
			</div>

			<div class="form-button-container">
				<button type="submit" name="register"> Submit </button>
				<button type="submit" name="reset"> Reset </button>
			</div>
			<?php
			if (isset($errors)) {
				?>
				<div class="alert alert-danger" style="margin-top: 30px;">
					<strong>Thông báo:</strong>
					<?php echo $errors; ?>
				</div>
				<?php
			}
			?>
		</form>

	</div>
</body>


</html>
