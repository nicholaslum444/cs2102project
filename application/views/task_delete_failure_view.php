<?php 
$session_data = $this->session->userdata('logged_in');
if ($session_data['user_role'] != ROLE_ADMIN) 
   echo '<meta http-equiv="Refresh" content="1; url=/">';        
else 
   echo '<meta http-equiv="Refresh" content="1; url=/admin">'; 
?>

<div class="content">
		<h1>Error encountered!</h1>
		<hr>
		<p>Your task has not been deleted. Click <a href="<?php echo base_url() ?>">here</a> to go back.</p>
		<p>If you are not redirected automatically, click <a href="<?php echo base_url() ?>">here</a>.</p>
</div>