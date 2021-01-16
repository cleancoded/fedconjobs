<?php
/**
 * Apply by email content.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-application-email.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.31.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
require_once( ABSPATH . 'wp-admin/includes/file.php' );
	if($_POST['mode'] != '' && $_POST['mode'] == 'send_email'){
		$to 	= $apply->email;
		//$to 	= "developercps75@gmail.com";
		$from 	= $_POST['from_email']; 

		$headers = 'From: No Name <myname@mydomain.com>' . "\r\n";

		$subject = 'Job Application';

		$msg = 'Hi you have a new job aplication';
		//echo $msg.' '.$subject.' '.$headers;exit;
		
		if ( ! function_exists( 'wp_handle_upload' ) ) {
		    require_once( ABSPATH . 'wp-admin/includes/file.php' );
		}

		$uploadedfile       = $_FILES['attachmentFile'];
		$upload_overrides   = array( 'test_form' => false );
		$movefile           = wp_handle_upload( $uploadedfile, $upload_overrides );

		if( $movefile ) {
			$movefile['url'];
		    //echo "File is valid, and was successfully uploaded.\n";
		    //var_dump( $movefile);
		    $attachments = $movefile[ 'file' ];
		    $mailResult = false;
		    //$mailResult = wp_mail('developercps75@gmail.com', $subject , $msg, $headers, $attachments);
		    $mailResult = wp_mail($to, $subject, strip_tags($msg), $headers, $attachments);
		    //echo $mailResult;exit;
		} else {
		    echo "Possible file upload attack!\n";
		}

		//wp_mail($to, $subject, $msg, $headers, $mail_attachment);
		
	}
?>
<p>
	<?php 
		printf( wp_kses_post( __( 'To apply for this job <strong>email your details to</strong> <a class="job_application_email" href="mailto:%1$s%2$s">%1$s</a>', 'wp-job-manager' ) ), esc_html( $apply->email ), '?subject=' . rawurlencode( $apply->subject ) ); 

		$home_url = get_home_url();
	
	?>
		<!-- Display email form -->
		<form method="post" action="" enctype="multipart/form-data">
		    <input type="hidden" name="from_email" value="no-email@email.com">
		    <input type="hidden" name="mode" value="send_email">
		    <div class="form-group">
		    	<input type="file" name="attachmentFile" class="form-control" accept="application/pdf">
		    </div>
		    <div class="submit">
		        <input type="submit" name="submit" class="btn" value="SUBMIT" style=" background-color: #000 !important; color: #fff !important;">
		    </div>
		</form>
</p>
