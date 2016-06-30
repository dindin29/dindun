<html>
	<head></head>
	<body>
		<form>
		Radio: <input type="radio" name="rad" id="rad1" value="1" class="rad"/> Form1 <input type="radio" name="rad" id="rad2" value="2" class="rad"/> Form2
			<!-- form yang mau ditampilkan-->
			<div id="form1" style="display:none">
				Input1: <input name="input" type="text"/>
			</div>
			<div id="form2" style="display:none">
				Input2: <input name="input" type="text"/>
			</div>
		</form>
		<!-- tambahkan jquery-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$(":radio.rad").click(function(){
					$("#form1, #form2").hide()
					if($(this).val() == "1"){
						$("#form1").show();
					}else{
						$("#form2").show();
					}
				});
			});
		</script>
	</body>
</html>