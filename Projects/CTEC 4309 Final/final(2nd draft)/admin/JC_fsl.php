<?php

// Turn off error reporting.
error_reporting(0);

# Start a new session, regenerate a session id if needed.
session_start();
if (!isset($_SESSION['INIT'])) {
	session_regenerate_id();
	$_SESSION['INIT'] = TRUE;
}

class JC_fsl {
	
	public static $_init;
	protected $_users = array();
	# Script configuration
	protected static $_script_name;
	protected static $_admin_email;
	protected static $_admin_name;
	private static $_version = '{Version 2.0.1}';

	protected function __construct() {

		if (!isset($_SESSION['LOGIN_ATTEMPTS']))
			$_SESSION['LOGIN_ATTEMPTS'] = 0;

		// Default user admin added.
		$this->_users = array(
			array(
				'USERNAME' => 'admin', 
				'PASSWORD' => 'pass1word', 
				'EMAIL' => 'enfieldtex@gmail.com', 
				'LOCATION' => 'index.php')
			);
	}

	public function __toString() {
		return 'SCRIPT NAME :: ' . self::$_script_name . "<br />" .
		' ADMIN EMAIL :: ' . self::$_admin_email . "<br />" .
		' ADMIN NAME :: ' . self::$_admin_name . "<br />" .
		' FSL VERSION :: ' . self::$_version;
	}

	/**
	 * This method allows you to peek inside the users list, so you can view their information.
	 **/
	public function peek() {
		var_dump($this->_users);
	}

	protected function ready_array($username, $password, $email, $location = 'index.php', $access = false) {
		return array('USERNAME' => $username, 'PASSWORD' => $password, 'EMAIL' => $email, 'LOCATION' => $location);
	}


	public function add($username, $password, $email, $location = 'index.php') {
		$add = $this->ready_array($username, $password, $email, $location);
		$this->_users[] = $add;
	}

	public static function logout() {
		if (isset($_SESSION['LOGGED_IN'])) {
			if (session_destroy()) 
				header('Location: index.html');
		}
	}

	/**
	 * This method increments or returns login attempts.
	 * @param <bool> true to increment by 1 and false to return.
	 */
	public static function attempts($add = false) {
		if ($add === true)
			$_SESSION['LOGIN_ATTEMPTS'] += 3;
		else
			return $_SESSION['LOGIN_ATTEMPTS'];
	}

	public function site_name() {
		return self::$_script_name;
	}

	public function validate($un, $pw) {
		# Check all of the arrays for the user
		for ($i=0;$i<count($this->_users);$i++) {
			if (array_key_exists('USERNAME', $this->_users[$i])) {
				if ($this->_users[$i]['USERNAME'] == $un) {
					# We have found the user check to see if there password matches also.
					$info = $this->_users[$i];
					if ($info['USERNAME'] == $un && $info['PASSWORD'] == $pw) {
						# We have a match redirect the user.
						$_SESSION['LOGGED_IN'] = TRUE;
						$_SESSION['LOGIN_ATTEMPTS'] = 0;
						$_SESSION['USERNAME'] = $info['USERNAME'];
						$_SESSION['EMAIL'] = $info['EMAIL'];
						header('Location: ' . $info['LOCATION']);
						return;
					}
				}
			}
		}
		echo '<h2 class=\'error\'>Incorrect username and or password, try again!</h2>';
		self::attempts(true);
	}

	/**
	 * Forgot password? not a problem call this method with the correct username
	 * and the user will be sent a password reminder. Please note that not of these passwords
	 * are hashed meaning this is not a good idea to store personal information behind this script!
	 * @param <string> The users email address.
	 * @return <bool> Returns true upon success. 
	 */
	public function forgot($email) {
		for ($i=0;$i<count($this->_users);$i++) {
			if (array_key_exists('EMAIL', $this->_users[$i])) {
				if ($this->_users[$i]['EMAIL'] == $email)
					$info = $this->_users[$i];
			} else return false;
		}
		if (isset($info) && is_array($info)) {
			# Send the user their password
			$to = $info['EMAIL'];
			$subject = 'You recently forgot your password | ' . self::$_script_name;
			$message = 'Hi ' . $info['USERNAME'] . ', ' . "\n\n";
			$message .= 'You recently requested your password for ' . self::$_script_name . ' if you didn\'t not to worry just ignore this ';
			$message .= 'email. Anyway you can find your email below, should you require anymore assistance then please contact us ';
			$message .= 'at ' . self::$_admin_email . ".\n\n";
			$message .= 'Username: ' . $info['USERNAME'] . "\n";
			$message .= 'Password: ' . $info['PASSWORD'];
			$message .= "\n\n" . 'Best Regards, ' . "\n" . self::$_admin_name;
			$headers = 'From: ' . self::$_admin_email . "\r\n" .
				'Reply-To: ' . self::$_admin_email . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
			
			# Uncomment for final version
			if (mail($to, $subject, $message, $headers)) return true;
		}
	}

	/**
	 * The secure method, simply call this to lock any page down it's as simple as that.
	 * @param <string> Name of the script EG: John's Script
	 * @param <string> Email of the administrator EG: john@suburbanarctic.com
	 * @param <string> Admin name EG: John Crossley
	 * @return <object> Returns an instanciated object of this class.
	 */
	public static function secure($s_name = 'admin login', $a_email = 'enfieldtex@gmail.com', $a_name = 'Enfield Tex') {

		self::$_script_name = $s_name;
		self::$_admin_email = $a_email;
		self::$_admin_name = $a_name;
		
		if (!self::$_init instanceof JC_fsl) {
			self::$_init = new JC_fsl();
		}
		return self::$_init;
	}
}

$secure = JC_fsl::secure();

$secure->add('m87hnf3u', 'ijnind7873439', 'email@jindifnis.com', 'index.html');

############ FORM PROCESSING ############
if (isset($_POST['username']) && isset($_POST['password'])) {
	$secure->validate($_POST['username'], $_POST['password']);
}
if (isset($_GET['logout'])) $secure->logout();

if (isset($_POST['forgot_password_button']) && isset($_POST['email'])) {
	// We need to send the user their password.
	if ($secure->forgot($_POST['email'])) {
		echo '<h2 class=\'success\'>Your password has been sent to your email address!</h2>';
	} else {
		echo '<h2 class=\'error\'>I\'m sorry but that email address has no record on this site.</h2>';
	}
}

?>
<?php if(!isset($_SESSION['LOGGED_IN'])): ?>
	<style type='text/css'>
		#fslv2-main{
			font-family:HelveticaNeue-Light, "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;font-weight:300;font-size:14px;line-height:1.6;
			width: 300px;
			margin: 2em auto;
			border: 1px solid #e5e5e5;
			background-color: #f5f5f5;
			border-radius: 3px;
			padding: 10px 10px 5px 10px;
		}
		fieldset { border: none; margin: 0; padding: 0;}
		.fslv2 .input { 
			border: 1px solid #b9b9b9; 
			padding: 5px;
			width: 225px;
			outline: none;
			font-size: 13px;
		}
		.fslv2 label {
			float: left;
			width: 72px;
			line-height: 28px;
		}
		h3 { font-weight: normal; }
		a { color: #b0281a; text-decoration: none; }
		a:hover { color: #b0281a; text-decoration: underline; }
		.button {
		    border: 1px solid #b0281a;
		    border-bottom: 1px solid #af301f;
		    background-color: #b0281a;
		    background-image: -webkit-gradient(linear,left top,left bottom,from(#dd4b39),to(#d14836));
		    border-radius: 2px;
		    padding: 6px 5px;
		    color: #ffffff;
		    text-shadow: 0 1px rgba(0, 0, 0, 0.1);
		    position: relative;
		    top: 5px;
		    left: 196px;
		    width: 100px;
		    min-width: 100px;
		    cursor: pointer;
		    font-size: 13px;
		    box-shadow: rgba(0,0,0,0.2);
		    -webkit-box-shadow: rgba(0,0,0,0.2);
		    -moz-box-shadow: rgba(0,0,0,0.2);
		}
		.button:hover {
    		background-image: -webkit-gradient(linear,left top,left bottom,from(#dd4b39), to(#c53727));
    		-moz-box-shadow: 0px 1px 1px rgba(0,0,0,0.2);
    		box-shadow: 0px 1px 1px rgba(0,0,0,0.2);
    		-webkit-box-shadow: 0px 1px 1px rgba(0,0,0,0.2);
		}
		.button:active {
			background-image: -webkit-gradient(linear,left top,left bottom,from(#dd4b39), to(#b0281a));
    		-moz-box-shadow: inset 0px 1px 2px rgba(0, 0, 0, 0.3);
    		box-shadow: inset 0px 1px 2px rgba(0, 0, 0, 0.3);
    		-webkit-box-shadow: inset 0px 1px 2px rgba(0, 0, 0, 0.3);
		}
		.input:focus {
			-moz-box-shadow: inset 0 0 3px #bbb;
			-webkit-box-shadow: inset 0 0 3px #bbb;
			box-shadow: inner 0 0 3px #bbb;
		}
		.fsl p.la { text-align: center; }
		.success {
			margin: 2em auto 1em auto;
			border: 1px solid #337f09;
			padding: 5px;
			background-color: #a5e383;
			width: 400px;
			text-align: center;
		    -webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			font-weight: normal;
			font-family:HelveticaNeue-Light, "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;font-weight:300;font-size:14px;line-height:1.6;
		}
		.error {
			margin: 2em auto 1em auto;
			border: 1px solid #a71010;
			padding: 5px;
			background-color: #ea7e7e;
			width: 400px;
			text-align: center;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			font-weight: normal;
			font-family:HelveticaNeue-Light, "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;font-weight:300;font-size:14px;line-height:1.6;
		}
	</style>
	<div id="fslv2-main">
	<?php if($secure->attempts() > 3): ?>
		<!-- Show the login form -->
		<p>Too many failed attempts, please try again later.</p>
	<?php elseif(isset($_GET['forgot_password'])): ?>
		<fieldset class="fslv2">
		<form method="post" action="#">
			<p>
				<label for='email'>Email: </label>
				<input type='text' name='email' class='input'/>
			</p>
			<p><input type='submit' name='forgot_password_button' class='button' value='Send!' /></p>
		</form>
	</fieldset>
	<small><a href="index.php">Cancel</a></small>
	<?php else: ?>
	<fieldset class="fslv2">
	<legend><?php echo $secure->site_name(); ?></legend>
		<form method="post" action="#">
			<p>
				<label for='username'>Username: </label>
				<input type='text' name='username' class='input'/>
			</p>
			<p>
				<label for='password'>Password: </label>
				<input type='password' name='password' class='input'/>
			</p>
			<p><input type='submit' name='login' class='button' value='Login' /></p>
		</form>
	</fieldset>
	<small><a href="?forgot_password">Forgot Password</a></small>
	<?php endif; ?>
	</div><!-- #fslv2-main -->
<?php exit(); endif; ?>
