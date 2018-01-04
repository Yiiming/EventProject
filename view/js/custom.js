jQuery(function($) {
	console.log("ready !");

	//Si on clique sur refusé
	$(".refuse").on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var line = $(this).parent("td").parent("tr");
		var btn = $(this).parent("td").children("button");
		var ajaxPath = "../../controller/backoffice/jsonManage.php";
		var data = "id_value="+$(this).val()+"&refused=1";
		$.ajax({
			type: 'POST',
			url: ajaxPath,
			data: data,
			dataType: 'json',
			success: function (data) {
				if(data["success"] == 1){
					alert(data["response"]);
					btn.addClass('hidden');
					line.hide(700);
				}else{
					alert(data["response"]);
				}
				
			},
			error: function (err, data) {
				console.log(err, data);
				alert("une erreur est survenue, merci de réessayer ultérieurement");
			}
		});
	});

	//Si on clique sur accepté
	$(".accepted").on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		
		var line = $(this).parent("td").parent("tr");
		var btn = $(this).parent("td").children("button");
		var ajaxPath = "../../controller/backoffice/jsonManage.php";
		var data = "id_value="+$(this).val()+"&accepted=1";
		$.ajax({
			type: 'POST',
			url: ajaxPath,
			data: data,
			dataType: 'json',
			beforeSend: function () {
			},
			success: function (data) {
				if(data["success"] == 1){
					alert(data["response"]);
					btn.addClass('hidden');
					line.hide(700);
				}else{
					alert(data["response"]);
				}
			},
			error: function (err, data) {
				console.log(err, data);
				alert("une erreur est survenue, merci de réessayer ultérieurement");
			}
		});
	});

	$(".camp").change(function () {
		$(".artefact").empty();
		$(".camp option:selected").each(function () {
			var data = $(this).val();
			$.ajax({
				type : 'POST',
				url: '../../controller/frontoffice/searchArtefact.php',
				data: "camp="+$(".camp").val(),
				dataType : 'json',
				success: function(data){
					for(var i = 0; i < data["id_response"].length; i++){
						console.log( data["id_response"][i]);
						console.log( data["art_response"][i]);
						var artefact = "<option value='" + data["id_response"][i] + "'>" + data["art_response"][i] + "</option>";
						$(".artefact").append(artefact); 
					}
				},
				error : function(err, data){
					console.log(err);
				}
			});
		});
	});

});