<?php 
$session_data = $this->session->userdata('logged_in');
if ($session_data['user_role'] != ROLE_ADMIN) 
   echo '<meta http-equiv="Refresh" content="1; url=/">';        
else 
   echo '<meta http-equiv="Refresh" content="1; url=/admin">'; 
?>

<div class="content">
		<h1>Success!</h1>
		<hr>
		<p>Your offer has been accepted. Please wait while we redirect you back to home page.</p>
		<p>If you are not redirected automatically, click <a href="<?php echo base_url() ?>">here</a>.</p>
</div>