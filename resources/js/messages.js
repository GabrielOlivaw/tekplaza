$(document).ready(function() {
	if ($("#messages-view").length) {		
		$("#messagesModalSendMessage").on("click", function(event) {
			$("#errorUser").text("");
			$("#errorContent").text("");
			
			$.ajax({
				type : "POST",
				url : sendMessageUrl,
				data: {to: $("#userTo :selected").val(), content: $("#messages-content").val()},
		        dataType: 'json',
		        cache: false,
		        headers: {'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content')},
				success : function(response) {
					if (response.errorUser === "" && response.errorContent === "") {
						$("#toastMessage").toast("show");
						$("#messagesModal").modal("hide");
					}
					if (response.errorUser !== "") {
						$("#errorUser").text(response.errorUser);
					}
					if (response.errorContent !== "") {
						$("#errorContent").text(response.errorContent);
					}
				},
				error: function (response) {
					console.log("error");
		      	}
			});
		});
	}
});
	