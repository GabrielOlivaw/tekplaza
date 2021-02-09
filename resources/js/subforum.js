// https://github.com/rmariuzzo/Laravel-JS-Localization
// https://salfade.com/tutorials/laravel-translation-with-vuejs

import Lang from './lang';
import translations from './translations.js';

Lang.setLocale(document.documentElement.lang);
Lang.setMessages(translations);

$(document).ready(function() {
	if ($("#subforum-view").length) {
		//console.log(Lang.get('website.user-list'));
		$("#filterButton").on("click", function(event) {
			filterThreads();
		});
		
		$("#filterInput").on("keydown", function(event) {
			if (event.keyCode === 13) {
				filterThreads();
			}
		});
		
		function filterThreads() {
			$.ajax({
				type : "GET",
				url : subforumUrl,
				data: {filter: $("#filterInput").val()},
		        dataType: 'json',
		        cache: false,
		        headers: {'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content')},
				success : function(response) {
					$("#threadList").empty();
					
					response.threads.data.forEach(function(thread){
						let threadItem = $("<div></div>");
						threadItem.attr("id", thread.id);
						threadItem.addClass("forum-item subforum-item px-3");
						
						let threadDetails = $("<div></div>");
						threadDetails.addClass("subforum-details");
						
						let threadTitle = $("<p></p>").text(thread.title + " ");
						threadTitle.addClass("font-weight-bold");
						
						if (thread.pinned == 1) {
							let threadPinnedIcon = $("<i></i>");
							threadPinnedIcon.addClass("fas fa-thumbtack forum-icon");
							threadPinnedIcon.prop("title", Lang.get("website.thread-pinned"));
							
							threadTitle.append(threadPinnedIcon, " ");
						}
						
						if (thread.locked == 1) {
							let threadLockedIcon = $("<i></i>");
							threadLockedIcon.addClass("fas fa-lock forum-icon");
							threadLockedIcon.prop("title", Lang.get("website.thread-locked"));
							
							threadTitle.append(threadLockedIcon);
						}
						
						let threadAuthor = $("<p></p>").text(`${Lang.get('website.post-author')}: ` + 
							thread.user_name);
						
						threadDetails.append(threadTitle, threadAuthor);
						
						let threadPostCount = $("<div></div>");
						threadPostCount.addClass("subforum-post-count");
						let postCount = Lang.get('website.post-number', {'post-number': thread.post_number});
						threadPostCount.html(`<p>${postCount}</p>`);
						
						threadItem.append(threadDetails, threadPostCount);
						
						let threadLink = $("<a></a>");
						threadLink.addClass("thread-element");
						threadLink.attr("href", `${threadListUrl}/${thread.id}`);
						
						threadLink.append(threadItem);
						
						$("#threadList").append(threadLink);
					});
					
					$("#threadsLinks").empty();
					$("#threadsLinks").html(response.pagination);
					
				},
				error: function (response) {
					console.log("error");
		      	}
			});
		}
	}
})