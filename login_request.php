<?
	// Nicht essenziell
	require __DIR__ . '/../debug.php';

	// Essenziell
	require __DIR__ . '/../util.php';
	

	// Session-Cookie erstellung
	// !! An dieser Stelle darf noch kein HTML gesendet sein !!
	session_start(['cookie_lifetime' => 0]);
?>

<html>
<body>

Processing...

<?
	// Datenbankanbindung
	$db = new_mysqli_connection();

	// Datenabhebung
	function get_account_data($db, $username) {
		// Input Safety Check
		if (!is_input_safe($username)) {
			$_SESSION['login_error'] = true;
			echo " <hr/> ERROR (get_account_data), REDIRECTING...
				   <script> window.location = 'login.php'; </script>
			     ";
			exit();
		}

		return $db->query("SELECT passwort FROM organisator WHERE name='$username'");
	}

	// Überprüfung des Passwortes
	function login($db, $username, $pwd) {
		$acc = get_account_data($db, $username)->fetch_row();
	
		if ($acc == NULL || count($acc) == 0) {
			$_SESSION['login_error'] = true;
			return false;
		}

		if ($acc[0] !== $pwd) {
			$_SESSION['login_error'] = true;
			return false;
		}

		return true;
	}

	// Login-Prozess
	$usr = $_POST['login_name'];

	if(login($db, $usr, hash('sha256', $_POST['login_pass']))) {
		$_SESSION['username'] = $usr;
		$_SESSION['logged_in'] = true;
		echo " <hr> SUCCESS, REDIRECTING...
	           <script> window.location = 'index.php'; </script>
			 ";
	} else
			echo " <hr/> ERROR (account validation), REDIRECTING...
			       <script> window.location = 'login.php'; </script>
				 ";
?>

</body>
</html>