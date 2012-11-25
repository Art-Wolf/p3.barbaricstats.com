<!-- Forms
================================================== -->
<section id="forms">
	<div class="page-header">
		<h1>Forms</h1>
	</div>

	<div class="row">
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
		</div>
	</div>

</section>
