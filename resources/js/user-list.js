$(document).ready(function() {
	if ($("#user-list-view").length) {
		var actionUserId;
		
		$("#messageModal").on("show.bs.modal", function(event) {
			var messageButton = $(event.relatedTarget);
			actionUserId = messageButton.data("userid");
			var messageUser = messageButton.data("username");
			var messageModal = $(this);
			messageModal.find(".modal-title span").text(messageUser);
		});
		
		$("#modalSendMessage").on("click", function(event) {
			$.ajax({
				type : "POST",
				url : sendMessageUrl,
				data: {to: actionUserId, content: $("#message-content").val()},
		        dataType: 'json',
		        cache: false,
		        headers: {'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content')},
				success : function(response) {
					$("#toastMessage").toast("show");
				},
				error: function (response) {
					console.log("error");
		      	}
			});
			
			$("#message-content").val("");		
			$("#messageModal").modal("hide");
		});
		
		$("#changeRoleModal").on("show.bs.modal", function(event) {
			var changeRoleButton = $(event.relatedTarget);
			actionUserId = changeRoleButton.data("userid");
			var changeRoleUser = changeRoleButton.data("username");
			var changeRoleUserRole = changeRoleButton.data("userrole");
			var changeRoleModal = $(this);
			changeRoleModal.find(".modal-body span").text(changeRoleUser);
			
			// Build select list with non-own roles
			let otherRoles = roles.filter(role => role.id != changeRoleUserRole);
			
			var roleList = changeRoleModal.find("#change-role");
			roleList.empty();
			
			otherRoles.forEach(role => addRoleToList(role, roleList));
			
			$("#change-role").prop("selectedIndex", $("#change-role option").length - 1);
			
			function addRoleToList(role, list) {
				let roleOption = document.createElement("option");
				roleOption.value = role.id;
				roleOption.innerText = role.name;
				list.append(roleOption);
			}
		});
		
		$("#modalChangeRole").on("click", function(event) {
			let selectedRole = $("#change-role").val();
			$.ajax({
				type : "PUT",
				url : changeRoleUrl,
				data: {user: actionUserId, newRole: selectedRole},
		        dataType: 'json',
		        cache: false,
		        headers: {'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content')},
				success : function(response) {
					console.log(response);
					$("#user" + actionUserId + " .user-role").text(response.newRole);
					$("#user" + actionUserId + " .changeRoleButton").data("userrole", selectedRole);
					$("#toastChangeRole").toast("show");
				},
				error: function (response) {
					console.log("error");
		      	}
			});
				
			$("#changeRoleModal").modal("hide");
		});
		
		$("#banModal").on("show.bs.modal", function(event) {
			var banButton = $(event.relatedTarget);
			actionUserId = banButton.data("userid");
			var banUser = banButton.data("username");
			var banModal = $(this);
			banModal.find(".modal-title span").text(banUser);
		});
		
		$("#modalBanUser").on("click", function(event) {
			$.ajax({
				type : "POST",
				url : banUserUrl,
				data: {user: actionUserId, motive: $("#ban-motive").val(), days: $("#ban-days").val(), subforum: $("#ban-subforum :selected").val()},
		        dataType: 'json',
		        cache: false,
		        headers: {'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content')},
				success : function(response) {
					$("#toastBan").toast("show");
				},
				error: function (response) {
					console.log("error");
		      	}
			});
			
			$("#ban-motive").val("");		
			$("#banModal").modal("hide");
		});
	}
});
	