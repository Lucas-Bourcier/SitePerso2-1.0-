<a href="<?php $url_propos; ?>" ><?php $Propos; ?></a>
<!DOCTYPE html>
<html>
    <head>
	        <meta charset="utf-8">
        <title>BOURCIER Lucas page profesionnelle</title>
		 <link   rel="stylesheet" type="text/css" href="../CSS/bbb.css">
	</head>
		  <body id="fond">
		  
		  
			<nav id="aa">
			<ul>
				<li><a href="../propos/propos.php">A propos</a></li>
				<li><a href="../comp/Comp.php">Compétences</a></li>
				<li><a href="../form/Form.php">Formation</a></li>
				<li><a href="../exp/Exp.php">Expériences</a></li>
				<li><a href="Cont.php">Contact</a></li>
			</ul>
			</nav>

<div id="fcf-body">

    <div id="fcf-form">
    <h3 id="O" >Contact us</h3>

    <form id="O" method="post" action="contact-form-process.php">
        
        <div class="fcf-form-group">
            <label id="NP" for="Name" class="fcf-label">Votre Nom</label>
            <div class="fcf-input-group">
                <input type="text" id="Name" name="Name" class="fcf-form-control" required>
            </div>
        </div>

        <div class="fcf-form-group">
            <label id="NP" for="Email" class="fcf-label">Votre Adresse Mail</label>
            <div class="fcf-input-group">
                <input type="email" id="Email" name="Email" class="fcf-form-control" required>
            </div>
        </div>

        <div class="fcf-form-group">
            <label id="NP" for="Message" class="fcf-label">Votre Message</label>
            <div class="fcf-input-group">
                <textarea id="Message" name="Message" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
            </div>
        </div>

        <div class="fcf-form-group">
            <button type="submit" id="fcf-button" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Envoyer le Message</button>
        </div>

    </form>
    </div>

</div>

<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "lucas.bourcier@sts-sio-caen.info";
    $email_subject = "New form submissions";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "Rip";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    Merci de m'avoir contacté, J'espere voir votre message dans les plus brefs délais.

<?php
}
?>
<img src="captcha.php" alt="captcha"/>
<?php
 echo include '../Captcha/Captcha2.php'
?>

<h2><a id="D" href="../mentions/mentions.html">Mentions Légales</h2>
	</body>
</html>