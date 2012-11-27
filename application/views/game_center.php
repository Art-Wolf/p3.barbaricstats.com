<?php
$attributes = array('class' => '', 'id' => '');

$mafia_ind = FALSE;
?>
<section id="forms">
	<div class="page-header">
		<h1>Game <?php if (count($game_info) < 7) { ?> Waiting On Players <?php } else { ?> In Progress <?php } ?></h1>
	</div>

	<div class="row">
		<div class="span11" id="game-state">
			<img src="/img/startup.png" width="600px">
		</div>

		<div class="span11" id="players">
			<table>
				<tr>
					<?php
					$count = 1;
					foreach ($game_info as $info) :
					?>
					<td id="player-<?php echo $count; ?>">
						<table class="table">

							<?php

							if($info->user_name == $this->session->userdata('user_name')) 
							{
								if($info->role == 1)
								{
									$mafia_ind = TRUE;
								}
							}

							?>
 
							<tr <?php if($info->user_name == $this->session->userdata('user_name')) { ?>class="success"<?php } ?>><td class="pagination-centered"><img src="/img/user.png" width="60px"></td></tr>
							<tr <?php if($info->user_name == $this->session->userdata('user_name')) { ?>class="success"<?php } ?>><td class="pagination-centered" <?php if($info->user_name == $this->session->userdata('user_name')) { ?>style="color: white"<?php } ?>><?php echo $info->user_name; ?></td></tr>
						</table>
					</td>
					<?php

						$count++;
						endforeach;
					?>
				</tr>
			</table>
		</div>

		<div class="span11 chat-input" id="chat-input">
		</div>


		<div class="span10 offset1">
			<table>
				<tr>
					<?php
						if($this->session->userdata('user_name')) {
					?>
					<td><label class="control-label" for="chat-input"><?php echo $this->session->userdata('user_name'); ?></label></td>
					<td><input type="text" class="input-xxlarge search-query" id="chat-message"></td>
					<td><button type="submit" class="btn" id="chat-submit">Submit</button></td>
					<?php } ?>
				</tr>
			</table>
			<script type="text/javascript">
			$('#chat-submit').click(function() {
				$.ajax({
                        	        url: "/index.php/game/chat_message",
                        	        async: false,
                        	        type: "POST",
                        	        data: "chat-message=" + $('#chat-message').val(),
                        	        success: function() {
                        	                $('#chat-message').val('');
                        	        }
                        	});
			});
			</script>
        <script type="text/javascript">
                setInterval(function() {
                                $.ajax({
                                        url: "/index.php/game/chat",
                                        async: false,
                                        type: "POST",
                                        data: "type=chat",
                                        dataType: "html",
                                        success: function(data) {
                                                $('#chat-input').html(data);
                                        }
                                })
                        }, 1000);

		setInterval(function() {
                                $.ajax({
                                        url: "/index.php/game/get_state",
                                        async: false,
                                        type: "POST",
                                        data: "type=chat",
                                        dataType: "html",
                                        success: function(data) {
                                                $('#game-state').html(data);
                                        }
                                })
                        }, 5000);
        </script>
		</div>

		<?php
		if($mafia_ind)
		{
		?>
		
		<h1>Private Mafia Chat</h1>
		<div class="span11 mafia-chat-input" id="mafia-chat-input">
                </div>


                <div class="span10 offset1">
                        <table>
                                <tr>
                                        <td><label class="control-label" for="mafia-chat-input"><?php echo $this->session->userdata('user_name'); ?></label></td>
                                        <td><input type="text" class="input-xxlarge search-query" id="mafia-chat-message"></td>
                                        <td><button type="submit" class="btn" id="mafia-chat-submit">Mafia Chat</button></td>
                                </tr>
                        </table>
                        <script type="text/javascript">
                        $('#mafia-chat-submit').click(function() {
                                $.ajax({
                                        url: "/index.php/game/mafia_chat_message",
                                        async: false,
                                        type: "POST",
                                        data: "mafia-chat-message=" + $('#mafia-chat-message').val(),
                                        success: function() {
                                                $('#mafia-chat-message').val('');
                                        }
                                });
                        });
                        </script>
        <script type="text/javascript">
                setInterval(function() {
                                $.ajax({
                                        url: "/index.php/game/mafia_chat",
                                        async: false,
                                        type: "POST",
                                        data: "type=chat",
                                        dataType: "html",
                                        success: function(data) {
                                                $('#mafia-chat-input').html(data);
                                        }
                                })
                        }, 1000);
        </script>
                </div>
		<?php
		}
		?>
	</div>

</section>
