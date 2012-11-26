<?php

$attributes = array('class' => '', 'id' => '');


$game_list = array_reverse($game_list);
?>
<section id="forms">
        <div class="page-header">
                <h1>Open Games</h1>
        </div>
	<div class="row">
		<div class="span10 offset1">
<?php
        foreach ($game_list as $game) :
?>
                	<p><?php echo $game->start_time; ?>) <strong><?php echo $game->cnt; ?></strong>: <?php echo $game->id; ?></p>
<?php
        endforeach;
?>
		</div>

		<div class="span11 chat-input" id="chat-input">
		</div>


		<div class="span10 offset1">
			<table>
				<tr>
					<td><label class="control-label" for="chat-input">Username</label></td>
					<td><input type="text" class="input-xxlarge search-query" id="chat-message"></td>
					<td><button type="submit" class="btn" id="chat-submit">Submit</button></td>
				</tr>
			</table>
			<script type="text/javascript">
			$('#chat-submit').click(function() {
				$.ajax({
                        	        url: "/index.php/ajax_chat/submit",
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
                                        url: "/index.php/ajax_chat",
                                        async: false,
                                        type: "POST",
                                        data: "type=chat",
                                        dataType: "html",
                                        success: function(data) {
                                                $('#chat-input').html(data);
                                        }
                                })
                        }, 1000);
        </script>
		</div>
	</div>

</section>
