<?php
/**
 * Form Handler
 * 
 * @package Josefin
 */
?>
 <?php  
	if(!defined(ABSPATH)){
		$pagePath = explode('/wp-content/', dirname(__FILE__));
		include_once(str_replace('wp-content/' , '', $pagePath[0] . '/wp-load.php'));
	}
 ?>

<?php
if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}

$to      = 'paalt84@gmail.com';
$from    = 'noreply@josefin.no';
$subject = 'File Test';
$message = 'the real deal';
 
// Obtain file upload vars
$fileatt      = $_FILES['file']['tmp_name'];
$fileatt_type = $_FILES['file']['type'];
$fileatt_name = $_FILES['file']['name'];
 
$headers = "From: $from";

$errors = array(); // array to hold validation errors
$request = json_decode(file_get_contents('php://input')); // Json Array with the form request data
$response = array(); // array to pass back response

// Read the file to be attached ('rb' = read binary)
 $file = fopen($fileatt,'rb');
 $data = fread($file,filesize($fileatt));
 fclose($file);
 
 // Generate a boundary string
 $semi_rand = md5(time());
 $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
 
 // Add the headers for a file attachment
 $headers .= "\nMIME-Version: 1.0\n" .
 "Content-Type: multipart/mixed;\n" .
 " boundary=\"{$mime_boundary}\"";
 
 // Add a multipart boundary above the plain message
 $message = "This is a multi-part message in MIME format.\n\n" .
 "--{$mime_boundary}\n" .
 "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
 "Content-Transfer-Encoding: 7bit\n\n" .
 $message . "\n\n";
 
 // Base64 encode the file data
 $data = chunk_split(base64_encode($data));
 
 // Add file attachment to the message
 $message .= "--{$mime_boundary}\n" .
 "Content-Type: {$fileatt_type};\n" .
 " name=\"{$fileatt_name}\"\n" .
 //"Content-Disposition: attachment;\n" .
 //" filename=\"{$fileatt_name}\"\n" .
 "Content-Transfer-Encoding: base64\n\n" .
 $data . "\n\n" .
 "--{$mime_boundary}--\n";

 
// Send the message
$ok = @mail($to, $subject, $message, $headers);
if ($ok) {
 echo "<p>Mail sent! Yay PHP!</p>";
} else {
 echo "<p>Mail could not be sent. Sorry!</p>";
}

//Id of the form
$form = $request->chooseForm;

//Depending on the form that has been submitted do a case
switch ($form) {
    case 1:
		//Set variables to the input fields
		$name = $request->nameCollaboration;
		$title = $request->titleCollaboration;
		$phone = $request->phoneCollaboration;
		$email = $request->emailCollaboration;
		$company = $request->companyCollaboration;
		$projectDescription = $request->projectDescriptionCollaboration;
		$timeframe = $request->timeFrameCollaboration;
		$costEsitmate = $request->costEstimateCollaboration;
		
		//Sanitze the fields
		sanitize_text_field( $name );
		sanitize_text_field( $title );
		sanitize_text_field( $phone );
		sanitize_email( $email );
		sanitize_text_field( $company );
		sanitize_text_field( $projectDescription );
		sanitize_text_field( $timeframe );
		sanitize_text_field( $costEsitmate );
		
		// validate the variables 
		if (isset($name)) {
			$name = strval($name);
			if(strlen($name) < 2) {
				$errors['name'] = 'Navnet ditt må være lenger enn to bokstaver';
			} else if (strlen($name) > 50) {
				$errors['name'] = 'Navnet ditt kan ikke være lenger enn 50 bokstaver';
			}
		} else {
			$errors['name'] = 'Du må oppgi ett navn';
		}
		
		if (isset($title)) {
			$title = strval($title);
			if(strlen($title) < 2) {
				$errors['title'] = 'Tittelen din må være lenger enn to bokstaver';
			} else if (strlen($title) > 50) {
				$errors['title'] = 'Navnet ditt kan ikke være lenger enn 50 bokstaver';
			}
		}
		
		if (isset($phone)) {
			$phone = intval($phone);
			if (!$phone) {
				$errors['phone'] = 'Telefonnummeret du oppga er ikke ett gyldig tall. Vennligst oppgi ett gyldig tall';
			}
		} else {
			$errors['phone'] = 'Du må oppgi ett telefonnummer';
		}
		
		if (isset($email)) {
			if(!(is_email($email))) {
				$errors['email'] = 'Epostadressen er ikke av ett gyldig format. Kontroller eventuelle skrivefeil.';	
			}	
		} else {
			$errors['email'] = 'Du må oppgi en e-postadresse';
		}
		
		if (isset($company)) {
			$company = strval($company);
			if(strlen($company) < 2) {
				$errors['company'] = 'Firmanavnet ditt må være lenger enn to bokstaver';
			} else if (strlen($company) > 50) {
				$errors['company'] = 'Firmanavnet ditt kan ikke være lenger enn 50 bokstaver';
			}
		} else {
			$errors['company'] = 'Du må oppgi ett firmanavn';
		}
		
		if (isset($projectDescription)) {
			$projectDescription = strval($projectDescription);
			if(strlen($projectDescription) < 10) {
				$errors['projectDescription'] = 'Prosjektforslaget ditt må være lenger enn ti tegn';
			} 
		} else {
			$errors['projectDescription'] = 'Du må skrive ett prosjektforslag';
		}
		
		$timeframe = intval($timeframe);
		if (!$timeframe) {
			$errors['timeframe'] = 'Tidsestimatet du oppga er ikke ett gyldig tall. Vennligst oppgi ett gyldig tall';
		}
		
		$costEstimate = intval($costEstimate);
		if (!$costEstimate) {
			$errors['costEstimate'] ='Kostnadsoverslaget du oppga er ikke ett gyldig tall. Vennligst oppgi ett gyldig tall';
		}
		
		break;
    case 2:
        //Set variables to the input fields
		$firstName = $request->firstNameApplication;
		$lastName = $request->lastNameApplication;
		$birthdate = $request->birthApplication;
		$phone = $request->phoneApplication;
		$email = $request->emailApplication;
		$country = $request->countryApplication;
		$maritalStatus = $request->maritalStatusApplication;
		$position = $request->choosePositionApplication;
		$application = $request->application;
		$cv = $request->url;
		$portfolio = $request->portfolioCollaboration;
		
		//Sanitze the fields
		sanitize_text_field( $firstName );
		sanitize_text_field( $lastName );
		sanitize_text_field( $birthdate );
		sanitize_text_field( $phone );
		sanitize_email( $email );
		sanitize_text_field( $country );
		sanitize_text_field( $maritalStatus );
		sanitize_text_field( $position );
		sanitize_text_field( $application );
		esc_url( $cv );
		esc_url( $portfolio );
		
		// validate the variables 
		if (isset($firstName)) {
			$firstName = strval($firstName);
			if(strlen($firstName) < 2) {
				$errors['firstName'] = 'Fornavnet ditt må være lenger enn to bokstaver';
			} else if (strlen($firstName) > 50) {
				$errors['firstName'] = 'Fornavnet ditt kan ikke være lenger enn 50 bokstaver';
			}
		} else {
			$errors['firstName'] = 'Du må oppgi ett fornavn';
		}
		
		if (isset($lastName)) {
			$lastName = strval($lastName);
			if(strlen($lastName) < 2) {
				$errors['lastName'] = 'Etternavnet ditt må være lenger enn to bokstaver';
			} else if (strlen($lastName) > 50) {
				$errors['lastName'] = 'Etternavnet ditt kan ikke være lenger enn 50 bokstaver';
			}
		} else {
			$errors['lastName'] = 'Du må oppgi ett etternavn';
		}
		
		$date = $birthdate;
		$intDate = array_map('intval', explode('-', $date));
		$year = $intDate[0]; 
		$day = zeroise($intDate[1], 2);
		$month = zeroise($intDate[2], 2);
		
		if (isset($birthdate)) {
			if (!(checkdate($month, $day, $year))){
				$errors['birthdate'] = 'Du har ikke valgt en gyldig dato.';
			}
		} else {
			$errors['birthdate'] = 'Du må velge en fødselsdato';
		}
		
		if (isset($phone)) {
			$phone = intval($phone);
			if (!$phone) {
				$errors['phone'] = 'Telefonnummeret du oppga er ikke ett gyldig tall. Vennligst oppgi ett gyldig tall';
			}
		} else {
			$errors['phone'] = 'Du må oppgi ett telefonnummer';
		}
		
		if (isset($email)) {
			if(!(is_email($email))) {
				$errors['email'] = 'Epostadressen er ikke av ett gyldig format. Kontroller eventuelle skrivefeil.';	
			}	
		} else {
			$errors['email'] = 'Du må oppgi en e-postadresse';
		}
		
		if (isset($country)) {
			$country = strval($country);
		} else {
			$errors['country'] = 'Du må velge ett land';
		}
		
		if (isset($maritalStatus)) {
			$maritalStatus = strval($maritalStatus);
		} else {
			$errors['maritalStatus'] = 'Du må velge en sivil stand';
		}
		
		if (isset($position)) {
			$position = strval($position);
		} else {
			$errors['position'] = 'Du må velge en yrkestittel';
		}
		
		if (isset($position)) {
			$position = strval($position);
		} else {
			$errors['position'] = 'Du må velge en yrkestittel';
		}
		
		if (isset($application)) {
			$application = strval($application);
			if(strlen($application) < 10) {
				$errors['application'] = 'Søknaden din må være lenger enn ti tegn';
			} 
		} else {
			$errors['application'] = 'Du må skrive en søknad';
		}
		
		if (isset($cv)) {
			$cv = strval($cv);
		} else {
			$errors['cv'] = 'Du må laste opp en CV';
		}
		
		if (isset($portfolio)) {
			$portfolio = strval($portfolio);
		} else {
			$errors['portfolio'] = 'Du må oppgi en portfolio';
		}
		
		$cv = str_replace("/home/4/q/qcumber/www", "http://www.qcumber.no", $cv);
	
        break;
    case 3:
        echo "Your favorite color is green!";
        break;
}

// return a response ===========================================================

// response if there are errors
if ( ! empty($errors)) {
	// if there are items in our errors array, return those errors
	$response['success'] = false;
	$response['errors'] = $errors;
	$response['messageError'] = 'An error occured submitting the form to the server. Please check the error message below.';
} else {
	// if there are no errors, return a message
	$response['success'] = true;
	switch($form) {
		case 1:
		$response['messageSuccess'] = 'Thank you ' . $name. ', for your proposal. We will get back to you as soon as possible.';
		break;
		case 2:
		$response['messageSuccess'] = 'Thank you ' . $firstName . ' for your interest in working for us, and for your application. We will get back to you as soon as possible';
		break;  
		case 3:
		$response['messageSuccess'] = 'Fantastisk. Nå gjenstår bare trinn 2:';
		break;    
	}
	
	// Send email
	
	//From and to
	$email_to = "paalt84@gmail.com";
	$email_from = "noreply@josefin.no";
	
	//Subject
	switch($form) {
		case 1:
		$email_subject = "Nytt prosjekt forslag fra ".$name." i ".$company;
		break;
		case 2:
		$email_subject = 'Søknad på stilling som ' . $position;
		break;  
		case 3:
		$email_subject = "Ny booking";
		break;    
	}
	
	//Message
	switch($form) {
		case 1:
		$email_message = "<html><body>";
		$email_message .= "<p><h2>Hei. Du har fått en ny forespørsel om prosjekt samarbeid</h2></p>\n\n";
		$email_message .= "<table rules='all' style='border-color: #666;' cellpadding='10'>";
		$email_message .= "<tr style='background: #eee;'><td><h2><strong>Fra:</strong></h2> </td><td></td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Navn:</strong> </td><td>" . $name . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Tittel:</strong> </td><td>" . $title . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Firma:</strong> </td><td>" . $company . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Telefon:</strong> </td><td>" . $phone . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>E-post:</strong> </td><td>" . $email . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Prosjektbeskrivelse:</strong> </td><td>" . $projectDescription . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Estimat i antall uker:</strong> </td><td>" . $timeframe . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Kostnadsoverslag i kr(tusen):</strong> </td><td>" . $costEsitmate . "</td></tr>";
		
		$email_message .= "</table>";
		$email_message .= " </body></html>";
		break;
		case 2:
		$email_message = "<html><body>";
		$email_message .= "<p><h2>Hei. " . $firstName . " " . $lastName . " har søkt på stilling som " . $position . "</h2></p>\n\n";
		$email_message .= "<table rules='all' style='border-color: #666;' cellpadding='10'>";
		$email_message .= "<tr style='background: #eee;'><td><h2><strong>Fra:</strong></h2> </td><td></td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Fornavn:</strong> </td><td>" . $firstName . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Etternavn:</strong> </td><td>" . $lastName . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Født:</strong> </td><td>" . $day . "." . $month . "." . $year . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Telefon:</strong> </td><td>" . $phone . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>E-post:</strong> </td><td>" . $email . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Land:</strong> </td><td>" . $country . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Sivilstatus:</strong> </td><td>" . $maritalStatus . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Søknad:</strong> </td><td>" . $application . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Link til CV:</strong> </td><td><a href='" . $cv . "'>" . $firstName . " sin CV</a></td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Link til Portfolio:</strong> </td><td><a href='" . $portfolio . "'>" . $portfolio . "</a></td></tr>";
		
		$email_message .= "</table>";
		$email_message .= " </body></html>";
		break;  
		case 3:
		$email_message = "<html><body>";
		$email_message .= "<p><h2>Hei. Du har fått en ny forespørsel om prosjekt samarbeid</h2></p>\n\n";
		$email_message .= "<table rules='all' style='border-color: #666;' cellpadding='10'>";
		$email_message .= "<tr style='background: #eee;'><td><h2><strong>Fra:</strong></h2> </td><td></td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Navn:</strong> </td><td>" . $name . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Tittel:</strong> </td><td>" . $title . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Firma:</strong> </td><td>" . $company . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Telefon:</strong> </td><td>" . $phone . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>E-post:</strong> </td><td>" . $email . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Prosjektbeskrivelse:</strong> </td><td>" . $projectDescription . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Estimat i antall uker:</strong> </td><td>" . $timeframe . "</td></tr>";
		$email_message .= "<tr style='background: #eee;'><td><strong>Kostnadsoverslag i kr(tusen):</strong> </td><td>" . $costEsitmate . "</td></tr>";
		
		$email_message .= "</table>";
		$email_message .= " </body></html>";
		break;    
	}
	
	
	//Headers
	$headers = "From: " .$email_from. "\r\n";
	$headers .= "Reply-To: ".$email_from. "\r\n";
	$headers .= "CC: copyto@thisadress.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	//Send the mail
	@mail($email_to, $email_subject, $email_message, $headers);
}
// return all our response to an AJAX call
echo json_encode($response);
?>