<?php
/**
 * Template Name: Contact Form
 *
 * The contact form page template displays the a
 * simple contact form in your website's content area.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
global $woo_options;
get_header();
 
$nameError = '';
$emailError = '';
$commentError = '';

//If the form is submitted
if( isset( $_POST['submitted'] ) ) {

	//Check to see if the honeypot captcha field was filled in
	if( trim( $_POST['checking'] ) !== '' ) {
		$captchaError = true;
	} else {

		//Check to make sure that the name field is not empty
		if( trim( $_POST['contactName'] ) === '' ) {
			$nameError =  __( 'You forgot to enter your name.', 'woothemes' );
			$hasError = true;
		} else {
			$name = trim( $_POST['contactName'] );
		}

if( trim( $_POST['contactTel'] ) !== '' ) {
			$tel = trim( $_POST['contactTel'] );
			
		}

		//Check to make sure sure that a valid email address is submitted
		if( trim( $_POST['email'] ) === '' )  {
			$emailError = __( 'You forgot to enter your email address.', 'woothemes' );
			$hasError = true;
		} else if ( ! eregi( "^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email'] ) ) ) {
			$emailError = __( 'You entered an invalid email address.', 'woothemes' );
			$hasError = true;
		} else {
			$email = trim( $_POST['email'] );
		}

		//Check to make sure comments were entered
		if( trim( $_POST['comments'] ) === '' ) {
			$commentError = __( 'You forgot to enter your comments.', 'woothemes' );
			$hasError = true;
		} else {
			$comments = stripslashes( trim( $_POST['comments'] ) );
		}

		//If there is no error, send the email
		if( ! isset( $hasError ) ) {

			$emailTo = get_option( 'woo_contactform_email' );
			$subject = __( 'Contact Form Submission from ', 'woothemes' ).$name;
			$sendCopy = trim( $_POST['sendCopy'] );
			$body = __( "Name: $name \n\nEmail: $email \n\nTelefone: $tel \n\nComments: $comments", 'woothemes' );
			$headers = __( 'From: ', 'woothemes') . "$name <$email>" . "\r\n" . __( 'Reply-To: ', 'woothemes' ) . $email;

			wp_mail( $emailTo, $subject, $body, $headers );

			if( $sendCopy == true ) {
				$subject = __( 'You emailed ', 'woothemes' ) . get_bloginfo( 'title' );
				$headers = __( 'From: ', 'woothemes' ) . "$name <$emailTo>";
				wp_mail( $email, $subject, $body, $headers );
			}

			$emailSent = true;

		}
	}
}
?>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery(document).ready(function() {
	jQuery( 'form#contactForm').submit(function() {
		jQuery( 'form#contactForm .error').remove();
		var hasError = false;
		jQuery( '.requiredField').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
				var labelText = jQuery(this).prev( 'label').text();
				jQuery(this).parent().append( '<span class="error"><?php _e( 'You forgot to enter your', 'woothemes' ); ?> '+labelText+'.</span>' );
				jQuery(this).addClass( 'inputError' );
				hasError = true;
			} else if(jQuery(this).hasClass( 'email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					var labelText = jQuery(this).prev( 'label').text();
					jQuery(this).parent().append( '<span class="error"><?php _e( 'You entered an invalid', 'woothemes' ); ?> '+labelText+'.</span>' );
					jQuery(this).addClass( 'inputError' );
					hasError = true;
				}
			}
		});
		if(!hasError) {
			var formInput = jQuery(this).serialize();
			jQuery.post(jQuery(this).attr( 'action'),formInput, function(data){
				jQuery( 'form#contactForm').slideUp( "fast", function() {
					jQuery(this).before( '<p class="tick"><?php _e( '<strong>Thanks!</strong> Your email was successfully sent.', 'woothemes' ); ?></p>' );
				});
			});
		}

		return false;

	});
});
//-->!]]>
</script>
<section class="interna">


            <?php if( isset( $emailSent ) && $emailSent == true ) { ?>

                <p class="info"><?php _e( 'Your email was successfully sent.', 'woothemes' ); ?></p>

            <?php } else { ?>

                <?php if ( have_posts() ) { ?>

                <?php while ( have_posts() ) { the_post(); ?>
                
                		
                			<h1><?php the_title(); ?></h1>
                       		<div class="message-page">
                       			<?php the_content(); ?>

		                    <?php if( isset( $hasError ) || isset( $captchaError ) ) { ?>
		                        <p class="alert"><?php _e( 'There was an error submitting the form.', 'woothemes' ); ?></p>
		                    <?php } ?>

		                    <?php if ( get_option( 'woo_contactform_email' ) == '' ) { ?>
		                        <?php echo do_shortcode( '[box type="alert"]' . __( 'E-mail has not been setup properly. Please add your contact e-mail!', 'woothemes' ) . '[/box]' );  ?>
		                    <?php } ?>

                       		</div>
	                        

                    <form action="<?php the_permalink(); ?>" id="contactForm" method="post">

                        <ol class="forms">
                            <li><label for="contactName"><?php _e( 'Seu Nome *', 'woothemes' ); ?></label>
                                <input type="text" name="contactName" id="contactName" value="<?php if( isset( $_POST['contactName'] ) ) { echo esc_attr( $_POST['contactName'] ); } ?>" class="txt requiredField" />
                                <?php if($nameError != '') { ?>
                                    <span class="error"><?php echo $nameError;?></span>
                                <?php } ?>
                            </li>

                            <li><label for="email"><?php _e( 'Seu e-mail *', 'woothemes' ); ?></label>
                                <input type="text" name="email" id="email" value="<?php if( isset( $_POST['email'] ) ) { echo esc_attr( $_POST['email'] ); } ?>" class="txt requiredField email" />
                                <?php if($emailError != '') { ?>
                                    <span class="error"><?php echo $emailError;?></span>
                                <?php } ?>
                            </li>
                            <li><label for="contactTel"><?php _e( 'Seu telefone', 'woothemes' ); ?></label>
                                <input type="text" name="contactTel" id="contactTel" value="<?php if( isset( $_POST['contactTel'] ) ) { echo esc_attr( $_POST['contactTel'] ); } ?>" class="txt requiredField" />
                                <?php if($nameError != '') { ?>
                                    <span class="error"><?php echo $nameError;?></span>
                                <?php } ?>
                            </li>

                            <li class="textarea"><label for="commentsText"><?php _e( 'Message', 'woothemes' ); ?></label>
                                <textarea name="comments" id="commentsText" rows="20" cols="30" class="requiredField"><?php if( isset( $_POST['comments'] ) ) { echo esc_textarea( $_POST['comments'] ); } ?></textarea>
                                <?php if( $commentError != '' ) { ?>
                                    <span class="error"><?php echo $commentError; ?></span>
                                <?php } ?>
                            </li>
                            
                            <li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><input class="submit button" type="submit" value="<?php esc_attr_e( 'Submit', 'woothemes' ); ?>" /></li>
                        </ol>
                    </form>

                    <?php
                    		} // End WHILE Loop
                    	}
                    }
                    ?>

</section>		


<?php get_footer(); ?>