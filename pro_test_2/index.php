<!DOCTYPE html>
<html>
<head>
	<title>TEST</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" crossorigin="anonymous">
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="container">
		<div class="form-group">
			<label>List : </label>
			<input type="text" name="list" id="list">
		</div>
		<div class="form-group">
			<label>ค้นหา : </label>
			<input type="text" name="keyword" id="keyword">
			<button type="submit" id="confirm">ค้นหา
		</div>
		<div class="form-group">
			<label>ประเภทค้นหา : </label>
			<select id="type" name="type">
				<option value="1">Linear Search</option>
				<option value="2">Binary Search</option>
				<option value="3">Bubble Search</option>
			</select>
		</div>
		<div class="form-group">
			<label>ผลลัพธ์ : </label><br>
			<label class="result"></label>
		</div>
	</div>
</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$( "#confirm" ).on( "click", function( event ) {
			var list = $("#list").val();
			var keyword = $("#keyword").val();	
			var type = $("#type").val();

			$.ajax({
				type: "POST",
				url: "search.php",
				data: { list: list, keyword: keyword, type: type},
				success: function(data) {
					var html = "";
					html += "List : ["+list+"]<br>";
					html += "Search : "+keyword+"<br>";
					html += "Result ::: <br>";

					$(".result").html(html);

				   	if(type == 3){
				   		html += "NewList : ["+data+"]<br>";
				   		html += "Bubble Search ผมหาข้อมูลไม่เจอว่าคืออะไร เจอแต่ Bubble Sort";
				   	}else{
				   		var i = 1;

						$.each( data, function( key, value ) {
							if(value == keyword){
								html += "ROUND : "+i+" ===> "+keyword+" = "+value+" found !!";
							}else{
								html += "ROUND : "+i+" ===> "+keyword+" != "+value+" <br>";
							}
						  	i++;
						});
				   	}

				   	$(".result").html(html);
				}
			});
		});
	</script>
</html>