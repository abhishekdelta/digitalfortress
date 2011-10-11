<?php
define("DIGIFORT_EMAIL","no-reply@hacklandmail.hl");
class messenger {
		var $vars;
		
			
		function assign_vars($vars) {
				$this->vars = (empty($this->vars)) ? $vars : $this->vars + $vars;
				}
				
		function mailer($to,$mailtype,$from) {
				
				if(!isset($from)) $from=DIGIFORT_EMAIL;
				
				//init mail template file path
				$mail_filepath= "/var/www/html/10/cms/P10/digitalfortress/ui/emails/$mailtype.txt"; 
				$drop_header = '';
				
				if(!file_exists($mail_filepath)) {echo "NO FILE called $mail_filepath FOUND !"; exit(1);} //check file
				if(($data = @file_get_contents($mail_filepath)) === false) {echo "$mail_filepath FILE READ ERROR !"; exit(1);} //read contents
				
				//escape quotes
				$body = str_replace ("'", "\'", $data); 
				//replace the vars in file content with those defined
				$body = preg_replace('#\{([a-z0-9\-_]*?)\}#is', "' . ((isset(\$this->vars['\\1'])) ? \$this->vars['\\1'] : '') . '", $body);
				//Make the content parseable
				eval("\$body = '$body';");
				
				//Extract the SUBJECT from mail content
				$match=array();
				$subject="";
				if (preg_match('#^(Subject:(.*?))$#m', $body, $match)) {
					//Find SUBJECT
					$subject = (trim($match[2]) != '') ? trim($match[2]) :  $subject ;
					$drop_header .= '[\r\n]*?' . preg_quote($match[1], '#');
				}
				if ($drop_header) {
					//Remove SUBJECT from BODY of mail
					$body = trim(preg_replace('#' . $drop_header . '#s', '', $body));
				}
				
				$header= "From : $from"."\r\n";
				//Debug info
				//echo displayinfo($from.' <br> '.$to.' <br> '.$subject.' <br> '.$body);
				
				//Send mail 
				return mail($to, $subject, $body, $header);
				}
	}

?>
