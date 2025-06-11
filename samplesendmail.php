<?php 
	$msg = "";
	if (isset($_POST['submit'])) {
		require_once 'vendor/autoload.php';
		require_once 'info.php';
		// Create the Transport
		$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
		  ->setUsername(EMAIL)
		  ->setPassword(PASS)
		;

		// Create the Mailer using your created Transport
		$mailer = new Swift_Mailer($transport);

		// Create a message
		$message = (new Swift_Message('Form Submit'))
		  ->setFrom([EMAIL => 'DRO'])
		  ->setTo(['ljndrbrmd@gmail.com'])
		  ->setBody('Name: '.$_POST['email'].'<br>Message : '.$_POST['message'],'text/html')
		  ;

		// Send the message
		$result = $mailer->send($message);
				if(!$result){
					$msg = '<div class="alert alert-danger text-center">Something went wrong!</div>';
				}
				else{
					$msg = '<div class="alert alert-success text-center">Message sent</div>';
				}
			}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

   <div class="modal-body">

      	
        <form action="" method="POST" enctype="multipart/form-data">
         
        		<div><?= $msg; ?></div>
                    <div class="form-group">
                        <input class="form-control" name="email" id="email" type="text" placeholder="Recipients">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="subject" type="text" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control textarea" name="message" placeholder="Compose your message.."></textarea>
                    </div>
                    <!-- <div class="form-group">
                     	<label>Upload your resume</label>
                        <input type="file" class="form-control" name="file" placeholder="file">
                    </div> -->
                    <div class="form-group">
                        <input class="form-control button btn-primary" type="submit" name="submit" value="Send" placeholder="Subject">
                    </div>
                </form>
      </div>
</body>
</html>