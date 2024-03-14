<?
// Nicht essenziell
require __DIR__ . '/../debug.php';


// Überprüfung des Login-Status(es?)
// !! An dieser Stelle darf noch kein HTML gesendet sein !!
session_start([
	'cookie_lifetime' => 0,
]);

if (!array_key_exists('logged_in', $_SESSION) || !$_SESSION['logged_in']) {
	echo "<html><script> window.location = 'login.php'; </script></html>";
	exit();
}
?>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initialt-scale=1">
	<link rel="stylesheet" type="text/css" href="index_layout.css" />
	<title>Terminkalender</title>
</head>

<head>
	<script>
		function link(to) {
			window.location = to;
			// TODO: Funktion ausbauen, um POSTs zu ermöglichen. (easy)
		}
	</script>
</head>

<body class="">

	<nav class="navbar">
		<ul>
			<li><button>Termine</button></li>
			<li><button onclick="link('login.php')"> Log Out </button></li>
			<li><button id="toggleButtons">Lightmode</button></li>
		</ul>
	</nav>


	<script>

		document.getElementsById('toggleButtons').addEventListener('click', function () {
			togglemode();
			toggleButtonText();
		})
		function togglemode() {
			var element = document.body;
			let darkmode = "Dunkel";
			let lightmode = "Hell";
			element.classList.toggle("light-mode");
			element.classList.toggle("dark-mode");
		}

		function toggleButtonText() {
			var button = document.getElementById("toggleButton");
			if (button.textContent === "Lightmode") {
				button.textContent = "Darkmode";
			} else {
				button.textContent = "Lightmode";
			}
		}

	</script>





</body>

</html>
//test
