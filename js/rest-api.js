// JavaScript Document
(
   function( $ ) {
       if ( undefined === restTheme ) {
           return;
       }
       var renderEvents = function( response ) {
           if ( response.events.length > 0 ) {   
			   var elems = '';
			   var a = 0; // Auto Increments if I need it
                for ( var event of response.events ) { 
						a++;
						/*var eventNode = $( '<li>' ); */
                    	var eventLink = event.url; // We're Good
					    var eventTitle = event.title; // We're Good new Date("2017-03-25");
						var eventDate = event.custom_fields.clean_date; // Almost Good, need to convert to month				
						var eventDay = event.custom_fields.clean_day; // Almost Good, need to convert to month
						var eventTime = event.custom_fields.clean_time; // Almost Good, need to convert to month
						if (event.custom_fields.organization_name !== 'None') {
					    	var eventOrg = event.custom_fields.organization_name; // Almost Good
						} else {
							var eventOrg = '';
						}						
						elems +='<div class="event"><ul class="blue"><li class="title">' + eventTitle + '</li><li class="time">' + eventTime + '</li><li class="date">' + eventDay + '</li><li class="location">' + eventOrg + '</li><li class="link"><a class="gray-link baskerville" href="' + eventLink + '" target="_blank">Learn More</a></li></ul></div>';
						$('#rest-events').html(elems);								
						/*eventNode.text( event.title );																	
                    	eventNode.appendTo( eventsNode );*/
						//$( "h2" ).insertAfter( $( ".cell-2" ) );
						$( ".cell-2" ).after( "</div><div class=\"row\" data-equalizer>" );
                }
            } else {
                var eventsNode = $( '' );
                eventsNode.text( 'No upcoming events found!' );
            }
            eventsNode.appendTo( $( '#rest-events' ) );
        };
        var showEvents = function() {
			var today = new Date();	
						var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
						var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
						var dateTime = date+' '+time;
            $.ajax( { 
                // get The Events Caleandar REST API root URL 
                url: restTheme.root + '/wp-json/tribe/events/v1/events/', 
                method: 'GET', 
                /*// set the `X-WP-Nonce` header to the nonce value 
                beforeSend: function( xhr ) { 
                    xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
                },*/ 
                // set some request data 
                data: { 'page': 1, 'per_page': 4, 'start_date': dateTime} // Selects which page of events to pull, how many events per page and the start date.
            } )
            // when done render the events list 
            .done( renderEvents ); 
        };  
        $( document ).ready( function() { showEvents(); } ); 
    } 
)( jQuery );

// General Category
$(function(){
	var restTheme = '';
	var page = 1,
		pagelimit = 5,
		totalrecord = 0;
	
	showEvents();

	// handling the prev-btn
	$(".prev-btn-general").on("click", function(){
		if (page > 1) {
			page--;
			showEvents();						
		} 
		console.log("Prev Page: " + page);
	});

	// handling the next-btn
	$(".next-btn-general").on("click", function(){
		if (page * pagelimit < totalrecord) {
			page++;
			showEvents();
		}
		console.log("Next Page: " + page);
	});
	
	function showEvents() {
		var today = new Date();	
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		// ajax() method to make api calls
		$.ajax({
			url: "https://jewishdetroitcalendar.org/wp-json/tribe/events/v1/events?tags=493,508",
			method: "GET",
			beforeSend: function( xhr ) { 
				xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
			}, 
			data: {
				'page': page,
				'per_page': pagelimit,
				'categories': 'general',			
				'start_date': dateTime
			},
			success: function(data) {
				console.log(data);

				// if (data.success) {
				if (data.events.length > 0 ) {
					var html = "";					
					totalrecord = data.total;
					totalPages = data.total_pages;
					if (page == 1) {
						$(".prev-btn-general").addClass("hide");
					} else {
						$(".prev-btn-general").removeClass("hide");
					}
					if (page == totalPages) {
						$(".next-btn-general").addClass("hide");
					} else {
						$(".next-btn-general").removeClass("hide");
					}
					for (var i = 0; i < data.events.length; i++) {
						var event = data.events[i];
						// var eventMain = event.url;
						if (event.website == '') {
							var eventLink = event.url;
						}	else {
							var eventLink = event.website;
						}
						var eventTitle = event.title;
						var eventHour = event.start_date_details.hour + ':' + event.start_date_details.minutes + ':' + event.start_date_details.seconds; // Almost Good, need to convert to month
						var H = +eventHour.substr(0, 2);
						var h = (H % 12) || 12;
						var ampm = H < 12 ? " am" : " pm";
						eventHour = h + eventHour.substr(2, 3) + ampm;														
						const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
						const d = new Date(event.start_date_details.month + '/' + event.start_date_details.day + '/' + event.start_date_details.year);
						var weekday = new Array(7);
						weekday[0] = "Sunday";
						weekday[1] = "Monday";
						weekday[2] = "Tuesday";
						weekday[3] = "Wednesday";
						weekday[4] = "Thursday";
						weekday[5] = "Friday";
						weekday[6] = "Saturday";
						var eventMonth = monthNames[d.getMonth()];
						var eventDay = event.start_date_details.day;
						var eventDayName = weekday[d.getDay()];
						var eventid = event.id;
						// var eventDate = ordinal(d.getDate());					
						// var eventVenue = event.venue.venue;  
						// var eventAddress = event.venue.address;
						// var eventCity = event.venue.city;
						// var eventState = event.venue.state;
						// var eventDate = new Date(event.start_date_details.month, event.start_date_details.month, event.start_date_details.month);
						if (event.custom_fields.organization_title !== 'Untitled') {
							var eventOrgName = event.custom_fields.organization_title + ' Presents:'; // Almost Good
						} else {
							var eventOrgName = '';
						}

						var eventOrgLogo = event.custom_fields.organization_logo;	
						html +='<section id="events-list" class="events-list"><div class="events-list--item"><a class="events-list--item--image" href="' + eventLink + '"><img data-scr="' + eventOrgLogo + '" class=" events-list--image lazyloaded" src="' + eventOrgLogo + '" style="width:100%;"></a><ul class="events-list--item--info"><li class="department">' + eventOrgName + '</li><li class="title"><a href="' + eventLink + '"><h4>' + eventTitle + '</h4></a></li><li class="time">' + eventDayName + ', ' + eventMonth + ' ' + eventDay + ' at ' + eventHour + '</li>';
						if (event.website == '') {
							html +='<li class="register"><a class="blue-link" href="/community-event?ref=' + eventid + '">More Info</a></li></ul></div></section>';
						} else {
							html +='<li class="register"><a class="blue-link" href="' + eventLink + '">Register</a></li></ul></div></section>';
						}
					}
					$("#result-general").html(html);					
				} else {
					var html = "";
					html += "<div class='sample-user'>No events scheduled.</div>";
					$("#result-general").html(html);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
});

// Kids and Family Category
$(function(){
	var restTheme = '';
	var page = 1,
		pagelimit = 5,
		totalrecord = 0;
	
	showEventsKidsFamily();

	// handling the prev-btn
	$(".prev-btn-kidsfamily").on("click", function(){
		if (page > 1) {
			page--;
			showEventsKidsFamily();						
		} 
		console.log("Prev Page: " + page);
	});

	// handling the next-btn
	$(".next-btn-kidsfamily").on("click", function(){
		if (page * pagelimit < totalrecord) {
			page++;
			showEventsKidsFamily();
		}
		console.log("Next Page: " + page);
	});

	function showEventsKidsFamily() {
		var today = new Date();	
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		// ajax() method to make api calls
		$.ajax({
			url: "https://jewishdetroitcalendar.org/wp-json/tribe/events/v1/events?tags=493,508",
			method: "GET",
			beforeSend: function( xhr ) { 
				xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
			}, 
			data: {
				'page': page,
				'per_page': pagelimit,
				'categories': 'kidsfamily',			
				'start_date': dateTime
			},
			success: function(data) {
				console.log(data);

				// if (data.success) {
				if (data.events.length > 0 ) {
					var html = "";					
					totalrecord = data.total;
					totalPages = data.total_pages;
					if (page == 1) {
						$(".prev-btn-kidsfamily").addClass("hide");
					} else {
						$(".prev-btn-kidsfamily").removeClass("hide");
					}
					if (page == totalPages) {
						$(".next-btn-kidsfamily").addClass("hide");
					} else {
						$(".next-btn-kidsfamily").removeClass("hide");
					}
					for (var i = 0; i < data.events.length; i++) {
						var event = data.events[i];
						// var eventMain = event.url;
						if (event.website == '') {
							var eventLink = event.url;
						}	else {
							var eventLink = event.website;
						}
						var eventTitle = event.title;
						var eventHour = event.start_date_details.hour + ':' + event.start_date_details.minutes + ':' + event.start_date_details.seconds; // Almost Good, need to convert to month
						var H = +eventHour.substr(0, 2);
						var h = (H % 12) || 12;
						var ampm = H < 12 ? " am" : " pm";
						eventHour = h + eventHour.substr(2, 3) + ampm;														
						const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
						const d = new Date(event.start_date_details.month + '/' + event.start_date_details.day + '/' + event.start_date_details.year);
						var weekday = new Array(7);
						weekday[0] = "Sunday";
						weekday[1] = "Monday";
						weekday[2] = "Tuesday";
						weekday[3] = "Wednesday";
						weekday[4] = "Thursday";
						weekday[5] = "Friday";
						weekday[6] = "Saturday";
						var eventMonth = monthNames[d.getMonth()];
						var eventDay = event.start_date_details.day;
						var eventDayName = weekday[d.getDay()];
						var eventid = event.id;
						// var eventDate = ordinal(d.getDate());					
						// var eventVenue = event.venue.venue;  
						// var eventAddress = event.venue.address;
						// var eventCity = event.venue.city;
						// var eventState = event.venue.state;

						// var eventDate = new Date(event.start_date_details.month, event.start_date_details.month, event.start_date_details.month);
						if (event.custom_fields.organization_title !== 'Untitled') {
							var eventOrgName = event.custom_fields.organization_title + ' Presents:'; // Almost Good
						} else {
							var eventOrgName = '';
						}

						var eventOrgLogo = event.custom_fields.organization_logo;	
						html +='<section id="events-list" class="events-list"><div class="events-list--item"><a class="events-list--item--image" href="' + eventLink + '"><img data-scr="' + eventOrgLogo + '" class=" events-list--image lazyloaded" src="' + eventOrgLogo + '" style="width:100%;"></a><ul class="events-list--item--info"><li class="department">' + eventOrgName + '</li><li class="title"><a href="' + eventLink + '"><h4>' + eventTitle + '</h4></a></li><li class="time">' + eventDayName + ', ' + eventMonth + ' ' + eventDay + ' at ' + eventHour + '</li>';
						if (event.website == '') {
							html +='<li class="register"><a class="blue-link" href="/community-event?ref=' + eventid + '">More Info</a></li></ul></div></section>';
						} else {
							html +='<li class="register"><a class="blue-link" href="' + eventLink + '">Register</a></li></ul></div></section>';
						}
					}
					$("#result-kidsfamily").html(html);					
				} else {
					var html = "";
					html += "<div class='sample-user'>No events scheduled.</div>";
					$("#result-kidsfamily").html(html);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
});

// Teens Category
$(function(){
	var restTheme = '';
	var page = 1,
		pagelimit = 5,
		totalrecord = 0;
	
	showEventsTeens();

	// handling the prev-btn
	$(".prev-btn-teens").on("click", function(){
		if (page > 1) {
			page--;
			showEventsTeens();						
		} 
		console.log("Prev Page: " + page);
	});

	// handling the next-btn
	$(".next-btn-teens").on("click", function(){
		if (page * pagelimit < totalrecord) {
			page++;
			showEventsTeens();
		}
		console.log("Next Page: " + page);
	});

	function showEventsTeens() {
		var today = new Date();	
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		// ajax() method to make api calls
		$.ajax({
			url: "https://jewishdetroitcalendar.org/wp-json/tribe/events/v1/events?tags=493,508",
			method: "GET",
			beforeSend: function( xhr ) { 
				xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
			}, 
			data: {
				'page': page,
				'per_page': pagelimit,
				'categories': 'teen',			
				'start_date': dateTime
			},
			success: function(data) {
				console.log(data);

				// if (data.success) {
				if (data.events.length > 0 ) {
					var html = "";					
					totalrecord = data.total;
					totalPages = data.total_pages;
					if (page == 1) {
						$(".prev-btn-teens").addClass("hide");
					} else {
						$(".prev-btn-teens").removeClass("hide");
					}
					if (page == totalPages) {
						$(".next-btn-teens").addClass("hide");
					} else {
						$(".next-btn-teens").removeClass("hide");
					}
					for (var i = 0; i < data.events.length; i++) {
						var event = data.events[i];
						// var eventMain = event.url;
						if (event.website == '') {
							var eventLink = event.url;
						}	else {
							var eventLink = event.website;
						}
						var eventTitle = event.title;
						var eventHour = event.start_date_details.hour + ':' + event.start_date_details.minutes + ':' + event.start_date_details.seconds; // Almost Good, need to convert to month
						var H = +eventHour.substr(0, 2);
						var h = (H % 12) || 12;
						var ampm = H < 12 ? " am" : " pm";
						eventHour = h + eventHour.substr(2, 3) + ampm;														
						const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
						const d = new Date(event.start_date_details.month + '/' + event.start_date_details.day + '/' + event.start_date_details.year);
						var weekday = new Array(7);
						weekday[0] = "Sunday";
						weekday[1] = "Monday";
						weekday[2] = "Tuesday";
						weekday[3] = "Wednesday";
						weekday[4] = "Thursday";
						weekday[5] = "Friday";
						weekday[6] = "Saturday";
						var eventMonth = monthNames[d.getMonth()];
						var eventDay = event.start_date_details.day;
						var eventDayName = weekday[d.getDay()];
						var eventid = event.id;
						// var eventDate = ordinal(d.getDate());					
						// var eventVenue = event.venue.venue;  
						// var eventAddress = event.venue.address;
						// var eventCity = event.venue.city;
						// var eventState = event.venue.state;
						// var eventDate = new Date(event.start_date_details.month, event.start_date_details.month, event.start_date_details.month);
						if (event.custom_fields.organization_title !== 'Untitled') {
							var eventOrgName = event.custom_fields.organization_title + ' Presents:'; // Almost Good
						} else {
							var eventOrgName = '';
						}

						var eventOrgLogo = event.custom_fields.organization_logo;	
						html +='<section id="events-list" class="events-list"><div class="events-list--item"><a class="events-list--item--image" href="' + eventLink + '"><img data-scr="' + eventOrgLogo + '" class=" events-list--image lazyloaded" src="' + eventOrgLogo + '" style="width:100%;"></a><ul class="events-list--item--info"><li class="department">' + eventOrgName + '</li><li class="title"><a href="' + eventLink + '"><h4>' + eventTitle + '</h4></a></li><li class="time">' + eventDayName + ', ' + eventMonth + ' ' + eventDay + ' at ' + eventHour + '</li>';
						if (event.website == '') {
							html +='<li class="register"><a class="blue-link" href="/community-event?ref=' + eventid + '">More Info</a></li></ul></div></section>';
						} else {
							html +='<li class="register"><a class="blue-link" href="' + eventLink + '">Register</a></li></ul></div></section>';
						}
					}
					$("#result-teens").html(html);					
				} else {
					var html = "";
					html += "<div class='sample-user'>No events scheduled.</div>";
					$("#result-teens").html(html);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
});

// Young Adults Category
$(function(){
	var restTheme = '';
	var page = 1,
		pagelimit = 5,
		totalrecord = 0;
	
	showEventsTeens();

	// handling the prev-btn
	$(".prev-btn-youngadults").on("click", function(){
		if (page > 1) {
			page--;
			showEventsTeens();						
		} 
		console.log("Prev Page: " + page);
	});

	// handling the next-btn
	$(".next-btn-youngadults").on("click", function(){
		if (page * pagelimit < totalrecord) {
			page++;
			showEventsTeens();
		}
		console.log("Next Page: " + page);
	});

	function showEventsTeens() {
		var today = new Date();	
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		// ajax() method to make api calls
		$.ajax({
			url: "https://jewishdetroitcalendar.org/wp-json/tribe/events/v1/events?tags=493,508",
			method: "GET",
			beforeSend: function( xhr ) { 
				xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
			}, 
			data: {
				'page': page,
				'per_page': pagelimit,
				'categories': 'young-adult',			
				'start_date': dateTime
			},
			success: function(data) {
				console.log(data);

				// if (data.success) {
				if (data.events.length > 0 ) {
					var html = "";					
					totalrecord = data.total;
					totalPages = data.total_pages;
					if (page == 1) {
						$(".prev-btn-youngadults").addClass("hide");
					} else {
						$(".prev-btn-youngadults").removeClass("hide");
					}
					if (page == totalPages) {
						$(".next-btn-youngadults").addClass("hide");
					} else {
						$(".next-btn-youngadults").removeClass("hide");
					}
					for (var i = 0; i < data.events.length; i++) {
						var event = data.events[i];
						// var eventMain = event.url;
						if (event.website == '') {
							var eventLink = event.url;
						}	else {
							var eventLink = event.website;
						}
						var eventTitle = event.title;
						var eventHour = event.start_date_details.hour + ':' + event.start_date_details.minutes + ':' + event.start_date_details.seconds; // Almost Good, need to convert to month
						var H = +eventHour.substr(0, 2);
						var h = (H % 12) || 12;
						var ampm = H < 12 ? " am" : " pm";
						eventHour = h + eventHour.substr(2, 3) + ampm;														
						const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
						const d = new Date(event.start_date_details.month + '/' + event.start_date_details.day + '/' + event.start_date_details.year);
						var weekday = new Array(7);
						weekday[0] = "Sunday";
						weekday[1] = "Monday";
						weekday[2] = "Tuesday";
						weekday[3] = "Wednesday";
						weekday[4] = "Thursday";
						weekday[5] = "Friday";
						weekday[6] = "Saturday";
						var eventMonth = monthNames[d.getMonth()];
						var eventDay = event.start_date_details.day;
						var eventDayName = weekday[d.getDay()];
						var eventid = event.id;
						// var eventDate = ordinal(d.getDate());					
						// var eventVenue = event.venue.venue;  
						// var eventAddress = event.venue.address;
						// var eventCity = event.venue.city;
						// var eventState = event.venue.state;
						// var eventDate = new Date(event.start_date_details.month, event.start_date_details.month, event.start_date_details.month);
						if (event.custom_fields.organization_title !== 'Untitled') {
							var eventOrgName = event.custom_fields.organization_title + ' Presents:'; // Almost Good
						} else {
							var eventOrgName = '';
						}

						var eventOrgLogo = event.custom_fields.organization_logo;	
						html +='<section id="events-list" class="events-list"><div class="events-list--item"><a class="events-list--item--image" href="' + eventLink + '"><img data-scr="' + eventOrgLogo + '" class=" events-list--image lazyloaded" src="' + eventOrgLogo + '" style="width:100%;"></a><ul class="events-list--item--info"><li class="department">' + eventOrgName + '</li><li class="title"><a href="' + eventLink + '"><h4>' + eventTitle + '</h4></a></li><li class="time">' + eventDayName + ', ' + eventMonth + ' ' + eventDay + ' at ' + eventHour + '</li>';
						if (event.website == '') {
							html +='<li class="register"><a class="blue-link" href="/community-event?ref=' + eventid + '">More Info</a></li></ul></div></section>';
						} else {
							html +='<li class="register"><a class="blue-link" href="' + eventLink + '">Register</a></li></ul></div></section>';
						}
					}
					$("#result-youngadults").html(html);					
				} else {
					var html = "";
					html += "<div class='sample-user'>No events scheduled.</div>";
					$("#result-youngadults").html(html);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
});

// Jewish Education Category
$(function(){
	var restTheme = '';
	var page = 1,
		pagelimit = 5,
		totalrecord = 0;
	
	showEventsJewished();

	// handling the prev-btn
	$(".prev-btn-jewished").on("click", function(){
		if (page > 1) {
			page--;
			showEventsJewished();						
		} 
		console.log("Prev Page: " + page);
	});

	// handling the next-btn
	$(".next-btn-jewished").on("click", function(){
		if (page * pagelimit < totalrecord) {
			page++;
			showEventsJewished();
		}
		console.log("Next Page: " + page);
	});

	function showEventsJewished() {
		var today = new Date();	
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		// ajax() method to make api calls
		$.ajax({
			url: "https://jewishdetroitcalendar.org/wp-json/tribe/events/v1/events?tags=493,508",
			method: "GET",
			beforeSend: function( xhr ) { 
				xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
			}, 
			data: {
				'page': page,
				'per_page': pagelimit,
				'categories': 'jewish-education',			
				'start_date': dateTime
			},
			success: function(data) {
				console.log(data);

				// if (data.success) {
				if (data.events.length > 0 ) {
					var html = "";					
					totalrecord = data.total;
					totalPages = data.total_pages;
					if (page == 1) {
						$(".prev-btn-jewished").addClass("hide");
					} else {
						$(".prev-btn-jewished").removeClass("hide");
					}
					if (page == totalPages) {
						$(".next-btn-jewished").addClass("hide");
					} else {
						$(".next-btn-jewished").removeClass("hide");
					}
					for (var i = 0; i < data.events.length; i++) {
						var event = data.events[i];
						// var eventMain = event.url;
						if (event.website == '') {
							var eventLink = event.url;
						}	else {
							var eventLink = event.website;
						}
						var eventTitle = event.title;
						var eventHour = event.start_date_details.hour + ':' + event.start_date_details.minutes + ':' + event.start_date_details.seconds; // Almost Good, need to convert to month
						var H = +eventHour.substr(0, 2);
						var h = (H % 12) || 12;
						var ampm = H < 12 ? " am" : " pm";
						eventHour = h + eventHour.substr(2, 3) + ampm;														
						const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
						const d = new Date(event.start_date_details.month + '/' + event.start_date_details.day + '/' + event.start_date_details.year);
						var weekday = new Array(7);
						weekday[0] = "Sunday";
						weekday[1] = "Monday";
						weekday[2] = "Tuesday";
						weekday[3] = "Wednesday";
						weekday[4] = "Thursday";
						weekday[5] = "Friday";
						weekday[6] = "Saturday";
						var eventMonth = monthNames[d.getMonth()];
						var eventDay = event.start_date_details.day;
						var eventDayName = weekday[d.getDay()];
						var eventid = event.id;
						// var eventDate = ordinal(d.getDate());					
						// var eventVenue = event.venue.venue;  
						// var eventAddress = event.venue.address;
						// var eventCity = event.venue.city;
						// var eventState = event.venue.state;
						// var eventDate = new Date(event.start_date_details.month, event.start_date_details.month, event.start_date_details.month);
						if (event.custom_fields.organization_title !== 'Untitled') {
							var eventOrgName = event.custom_fields.organization_title + ' Presents:'; // Almost Good
						} else {
							var eventOrgName = '';
						}

						var eventOrgLogo = event.custom_fields.organization_logo;	
						html +='<section id="events-list" class="events-list"><div class="events-list--item"><a class="events-list--item--image" href="' + eventLink + '"><img data-scr="' + eventOrgLogo + '" class=" events-list--image lazyloaded" src="' + eventOrgLogo + '" style="width:100%;"></a><ul class="events-list--item--info"><li class="department">' + eventOrgName + '</li><li class="title"><a href="' + eventLink + '"><h4>' + eventTitle + '</h4></a></li><li class="time">' + eventDayName + ', ' + eventMonth + ' ' + eventDay + ' at ' + eventHour + '</li>';
						if (event.website == '') {
							html +='<li class="register"><a class="blue-link" href="/community-event?ref=' + eventid + '">More Info</a></li></ul></div></section>';
						} else {
							html +='<li class="register"><a class="blue-link" href="' + eventLink + '">Register</a></li></ul></div></section>';
						}
					}
					$("#result-jewished").html(html);					
				} else {
					var html = "";
					html += "<div class='sample-user'>No events scheduled.</div>";
					$("#result-jewished").html(html);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
});


// Adult Education Category
$(function(){
	var restTheme = '';
	var page = 1,
		pagelimit = 5,
		totalrecord = 0;
	
	showEventsAdulted();

	// handling the prev-btn
	$(".prev-btn-adulted").on("click", function(){
		if (page > 1) {
			page--;
			showEventsAdulted();						
		} 
		console.log("Prev Page: " + page);
	});

	// handling the next-btn
	$(".next-btn-adulted").on("click", function(){
		if (page * pagelimit < totalrecord) {
			page++;
			showEventsAdulted();
		}
		console.log("Next Page: " + page);
	});

	function showEventsAdulted() {
		var today = new Date();	
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		// ajax() method to make api calls
		$.ajax({
			url: "https://jewishdetroitcalendar.org/wp-json/tribe/events/v1/events?tags=493,508",
			method: "GET",
			beforeSend: function( xhr ) { 
				xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
			}, 
			data: {
				'page': page,
				'per_page': pagelimit,
				'categories': 'adult-education',			
				'start_date': dateTime
			},
			success: function(data) {
				console.log(data);

				// if (data.success) {
				if (data.events.length > 0 ) {
					var html = "";					
					totalrecord = data.total;
					totalPages = data.total_pages;
					if (page == 1) {
						$(".prev-btn-adulted").addClass("hide");
					} else {
						$(".prev-btn-adulted").removeClass("hide");
					}
					if (page == totalPages) {
						$(".next-btn-adulted").addClass("hide");
					} else {
						$(".next-btn-adulted").removeClass("hide");
					}
					for (var i = 0; i < data.events.length; i++) {
						var event = data.events[i];
						// var eventMain = event.url;
						if (event.website == '') {
							var eventLink = event.url;
						}	else {
							var eventLink = event.website;
						}
						var eventTitle = event.title;
						var eventHour = event.start_date_details.hour + ':' + event.start_date_details.minutes + ':' + event.start_date_details.seconds; // Almost Good, need to convert to month
						var H = +eventHour.substr(0, 2);
						var h = (H % 12) || 12;
						var ampm = H < 12 ? " am" : " pm";
						eventHour = h + eventHour.substr(2, 3) + ampm;														
						const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
						const d = new Date(event.start_date_details.month + '/' + event.start_date_details.day + '/' + event.start_date_details.year);
						var weekday = new Array(7);
						weekday[0] = "Sunday";
						weekday[1] = "Monday";
						weekday[2] = "Tuesday";
						weekday[3] = "Wednesday";
						weekday[4] = "Thursday";
						weekday[5] = "Friday";
						weekday[6] = "Saturday";
						var eventMonth = monthNames[d.getMonth()];
						var eventDay = event.start_date_details.day;
						var eventDayName = weekday[d.getDay()];
						var eventid = event.id;
						// var eventDate = ordinal(d.getDate());					
						// var eventVenue = event.venue.venue;  
						// var eventAddress = event.venue.address;
						// var eventCity = event.venue.city;
						// var eventState = event.venue.state;
						// var eventDate = new Date(event.start_date_details.month, event.start_date_details.month, event.start_date_details.month);
						if (event.custom_fields.organization_title !== 'Untitled') {
							var eventOrgName = event.custom_fields.organization_title + ' Presents:'; // Almost Good
						} else {
							var eventOrgName = '';
						}

						var eventOrgLogo = event.custom_fields.organization_logo;	
						html +='<section id="events-list" class="events-list"><div class="events-list--item"><a class="events-list--item--image" href="' + eventLink + '"><img data-scr="' + eventOrgLogo + '" class=" events-list--image lazyloaded" src="' + eventOrgLogo + '" style="width:100%;"></a><ul class="events-list--item--info"><li class="department">' + eventOrgName + '</li><li class="title"><a href="' + eventLink + '"><h4>' + eventTitle + '</h4></a></li><li class="time">' + eventDayName + ', ' + eventMonth + ' ' + eventDay + ' at ' + eventHour + '</li>';
						if (event.website == '') {
							html +='<li class="register"><a class="blue-link" href="/community-event?ref=' + eventid + '">More Info</a></li></ul></div></section>';
						} else {
							html +='<li class="register"><a class="blue-link" href="' + eventLink + '">Register</a></li></ul></div></section>';
						}
					}
					$("#result-adulted").html(html);					
				} else {
					var html = "";
					html += "<div class='sample-user'>No events scheduled.</div>";
					$("#result-adulted").html(html);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
});

// Holidays Category
$(function(){
	var restTheme = '';
	var page = 1,
		pagelimit = 5,
		totalrecord = 0;
	
	showEventsHolidays();

	// handling the prev-btn
	$(".prev-btn-holidays").on("click", function(){
		if (page > 1) {
			page--;
			showEventsHolidays();						
		} 
		console.log("Prev Page: " + page);
	});

	// handling the next-btn
	$(".next-btn-holidays").on("click", function(){
		if (page * pagelimit < totalrecord) {
			page++;
			showEventsHolidays();
		}
		console.log("Next Page: " + page);
	});

	function showEventsHolidays() {
		var today = new Date();	
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		// ajax() method to make api calls
		$.ajax({
			url: "https://jewishdetroitcalendar.org/wp-json/tribe/events/v1/events?tags=493,508",
			method: "GET",
			beforeSend: function( xhr ) { 
				xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
			}, 
			data: {
				'page': page,
				'per_page': pagelimit,
				'categories': 'jewish-holidays',			
				'start_date': dateTime
			},
			success: function(data) {
				console.log(data);

				// if (data.success) {
				if (data.events.length > 0 ) {
					var html = "";					
					totalrecord = data.total;
					totalPages = data.total_pages;
					if (page == 1) {
						$(".prev-btn-holidays").addClass("hide");
					} else {
						$(".prev-btn-holidays").removeClass("hide");
					}
					if (page == totalPages) {
						$(".next-btn-holidays").addClass("hide");
					} else {
						$(".next-btn-holidays").removeClass("hide");
					}
					for (var i = 0; i < data.events.length; i++) {
						var event = data.events[i];
						// var eventMain = event.url;
						if (event.website == '') {
							var eventLink = event.url;
						}	else {
							var eventLink = event.website;
						}
						var eventTitle = event.title;
						var eventHour = event.start_date_details.hour + ':' + event.start_date_details.minutes + ':' + event.start_date_details.seconds; // Almost Good, need to convert to month
						var H = +eventHour.substr(0, 2);
						var h = (H % 12) || 12;
						var ampm = H < 12 ? " am" : " pm";
						eventHour = h + eventHour.substr(2, 3) + ampm;														
						const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
						const d = new Date(event.start_date_details.month + '/' + event.start_date_details.day + '/' + event.start_date_details.year);
						var weekday = new Array(7);
						weekday[0] = "Sunday";
						weekday[1] = "Monday";
						weekday[2] = "Tuesday";
						weekday[3] = "Wednesday";
						weekday[4] = "Thursday";
						weekday[5] = "Friday";
						weekday[6] = "Saturday";
						var eventMonth = monthNames[d.getMonth()];
						var eventDay = event.start_date_details.day;
						var eventDayName = weekday[d.getDay()];
						var eventid = event.id;
						// var eventDate = ordinal(d.getDate());					
						// var eventVenue = event.venue.venue;  
						// var eventAddress = event.venue.address;
						// var eventCity = event.venue.city;
						// var eventState = event.venue.state;
						// var eventDate = new Date(event.start_date_details.month, event.start_date_details.month, event.start_date_details.month);
						if (event.custom_fields.organization_title !== 'Untitled') {
							var eventOrgName = event.custom_fields.organization_title + ' Presents:'; // Almost Good
						} else {
							var eventOrgName = '';
						}

						var eventOrgLogo = event.custom_fields.organization_logo;	
						html +='<section id="events-list" class="events-list"><div class="events-list--item"><a class="events-list--item--image" href="' + eventLink + '"><img data-scr="' + eventOrgLogo + '" class=" events-list--image lazyloaded" src="' + eventOrgLogo + '" style="width:100%;"></a><ul class="events-list--item--info"><li class="department">' + eventOrgName + '</li><li class="title"><a href="' + eventLink + '"><h4>' + eventTitle + '</h4></a></li><li class="time">' + eventDayName + ', ' + eventMonth + ' ' + eventDay + ' at ' + eventHour + '</li>';
						if (event.website == '') {
							html +='<li class="register"><a class="blue-link" href="/community-event?ref=' + eventid + '">More Info</a></li></ul></div></section>';
						} else {
							html +='<li class="register"><a class="blue-link" href="' + eventLink + '">Register</a></li></ul></div></section>';
						}
					}
					$("#result-holidays").html(html);					
				} else {
					var html = "";
					html += "<div class='sample-user'>No events scheduled.</div>";
					$("#result-holidays").html(html);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
});

// Religious Category
$(function(){
	var restTheme = '';
	var page = 1,
		pagelimit = 5,
		totalrecord = 0;
	
	showEventsReligious();

	// handling the prev-btn
	$(".prev-btn-religious").on("click", function(){
		if (page > 1) {
			page--;
			showEventsReligious();						
		} 
		console.log("Prev Page: " + page);
	});

	// handling the next-btn
	$(".next-btn-religious").on("click", function(){
		if (page * pagelimit < totalrecord) {
			page++;
			showEventsReligious();
		}
		console.log("Next Page: " + page);
	});

	function showEventsReligious() {
		var today = new Date();	
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		// ajax() method to make api calls
		$.ajax({
			url: "https://jewishdetroitcalendar.org/wp-json/tribe/events/v1/events?tags=493,508",
			method: "GET",
			beforeSend: function( xhr ) { 
				xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
			}, 
			data: {
				'page': page,
				'per_page': pagelimit,
				'categories': 'religious-services',			
				'start_date': dateTime
			},
			success: function(data) {
				console.log(data);

				// if (data.success) {
				if (data.events.length > 0 ) {
					var html = "";					
					totalrecord = data.total;
					totalPages = data.total_pages;
					if (page == 1) {
						$(".prev-btn-religious").addClass("hide");
					} else {
						$(".prev-btn-religious").removeClass("hide");
					}
					if (page == totalPages) {
						$(".next-btn-religious").addClass("hide");
					} else {
						$(".next-btn-religious").removeClass("hide");
					}
					for (var i = 0; i < data.events.length; i++) {
						var event = data.events[i];
						// var eventMain = event.url;
						if (event.website == '') {
							var eventLink = event.url;
						}	else {
							var eventLink = event.website;
						}
						var eventTitle = event.title;
						var eventHour = event.start_date_details.hour + ':' + event.start_date_details.minutes + ':' + event.start_date_details.seconds; // Almost Good, need to convert to month
						var H = +eventHour.substr(0, 2);
						var h = (H % 12) || 12;
						var ampm = H < 12 ? " am" : " pm";
						eventHour = h + eventHour.substr(2, 3) + ampm;														
						const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
						const d = new Date(event.start_date_details.month + '/' + event.start_date_details.day + '/' + event.start_date_details.year);
						var weekday = new Array(7);
						weekday[0] = "Sunday";
						weekday[1] = "Monday";
						weekday[2] = "Tuesday";
						weekday[3] = "Wednesday";
						weekday[4] = "Thursday";
						weekday[5] = "Friday";
						weekday[6] = "Saturday";
						var eventMonth = monthNames[d.getMonth()];
						var eventDay = event.start_date_details.day;
						var eventDayName = weekday[d.getDay()];
						var eventid = event.id;
						// var eventDate = ordinal(d.getDate());					
						// var eventVenue = event.venue.venue;  
						// var eventAddress = event.venue.address;
						// var eventCity = event.venue.city;
						// var eventState = event.venue.state;
						// var eventDate = new Date(event.start_date_details.month, event.start_date_details.month, event.start_date_details.month);
						if (event.custom_fields.organization_title !== 'Untitled') {
							var eventOrgName = event.custom_fields.organization_title + ' Presents:'; // Almost Good
						} else {
							var eventOrgName = '';
						}

						var eventOrgLogo = event.custom_fields.organization_logo;	
						html +='<section id="events-list" class="events-list"><div class="events-list--item"><a class="events-list--item--image" href="' + eventLink + '"><img data-scr="' + eventOrgLogo + '" class=" events-list--image lazyloaded" src="' + eventOrgLogo + '" style="width:100%;"></a><ul class="events-list--item--info"><li class="department">' + eventOrgName + '</li><li class="title"><a href="' + eventLink + '"><h4>' + eventTitle + '</h4></a></li><li class="time">' + eventDayName + ', ' + eventMonth + ' ' + eventDay + ' at ' + eventHour + '</li>';
						if (event.website == '') {
							html +='<li class="register"><a class="blue-link" href="/community-event?ref=' + eventid + '">More Info</a></li></ul></div></section>';
						} else {
							html +='<li class="register"><a class="blue-link" href="' + eventLink + '">Register</a></li></ul></div></section>';
						}
					}
					$("#result-religious").html(html);					
				} else {
					var html = "";
					html += "<div class='sample-user'>No events scheduled.</div>";
					$("#result-religious").html(html);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
});


$(document).ready(function() {
	$('button').click(function(){
		$('#overlay').fadeIn().delay(2000).fadeOut();
	});
});

// Create event page from Jewish Detroit Calendar 
(
function( $ ) {
	"use strict";

	var restTheme = '';
   	if ( undefined === restTheme ) {
		return;
   	}
	function ordinal( n ) {
   		var s = [ "th", "st", "nd", "rd" ],
       		v = n % 100;
   		return n + ( s[ (v-20) % 10 ] || s[ v ] || s[ 0 ] );
	}	
   	var renderEvents = function( response ) {
	   if ( response ) {   
		   var elems = ''; 
		   	/* for ( var event of response.events ) {  -- This is code that works for all browsers, except IE11 */
					var event = response; // This is code to make the feed work on all browsers, including IE11
		   			var eventTitle = event.title;
					var eventDesc = event.description; // We're Good
					var length = 200;
		   			var eventid = event.id;
					var stripedDesc = eventDesc.replace(/<[^>]+>/g, '');
					var trimmedDesc = stripedDesc.substring(0, length);
					var eventMain = event.url;
					if (event.website == '') {
						var eventLink = event.url;
					}	else {
						var eventLink = event.website;
					}
					
					var eventTitle = event.title; // We're Good new Date("2017-03-25");
					var eventHour = event.start_date_details.hour + ':' + event.start_date_details.minutes + ':' + event.start_date_details.seconds; // Almost Good, need to convert to month
						var H = +eventHour.substr(0, 2);
						var h = (H % 12) || 12;
						var ampm = H < 12 ? " am" : " pm";
						eventHour = h + eventHour.substr(2, 3) + ampm;														
					const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
					const d = new Date(event.start_date_details.month + '/' + event.start_date_details.day + '/' + event.start_date_details.year);
					var weekday = new Array(7);
					weekday[0] = "Sunday";
					weekday[1] = "Monday";
					weekday[2] = "Tuesday";
					weekday[3] = "Wednesday";
					weekday[4] = "Thursday";
					weekday[5] = "Friday";
					weekday[6] = "Saturday";
					var eventMonth = monthNames[d.getMonth()];
					var eventDay = event.start_date_details.day;
					var eventDayName = weekday[d.getDay()];
					var eventDate = ordinal(d.getDate());					
					var eventVenue = event.venue.venue;  
					var eventAddress = event.venue.address;
					var eventCity = event.venue.city;
					var eventState = event.venue.state;
					// var eventDate = new Date(event.start_date_details.month, event.start_date_details.month, event.start_date_details.month);
					if (event.custom_fields.organization_title !== 'Untitled') {
						var eventOrgName = event.custom_fields.organization_title + ' Presents:'; // Almost Good
					} else {
						var eventOrgName = '';
					}
		   			var eventVenue = event.venue.venue;
					var organizerName = event.json_ld.organizer.name;
		   			var organizerPhone = event.json_ld.organizer.telephone;
		   			var organizerEmail = event.json_ld.organizer.email;
		   			var eventOrgLogo = event.custom_fields.organization_logo;
		   		   	
					elems +='<main id="individual-event" class="individual-event"><div id="tribe-events-content" class="tribe-events-single tribe-blocks-editor"><img class="individual-event--img" src="' + eventOrgLogo + '"><h5>' + eventOrgName + '</h5><h1 class="individual-event--title baskerville">' + eventTitle + '</h1><ul class="individual-event--info"><li class="location">' + eventVenue + '</li><li class="date">' + eventDayName + ', ' + eventMonth + ' ' + eventDay + ' at ' + eventHour + '</li><li class="contact">' + organizerName + ' - ' + organizerPhone + '<a href="mailto:' + organizerEmail + '">' + organizerEmail + '</a></li></ul><section class="individual-event--details">' + eventDesc + '&nbsp;</section>';
					if (event.website == '') {
						elems +='<a class="blue-link" href="' + eventLink + '">Click here for more info</a></main>';
					} else {
						elems +='<a class="blue-link" href="' + eventLink + '">Click here to register</a></main>';
					}
				
					$('.singleevent').html(elems);		
				console.log(event);
			

		} else {
			var eventsNode = $( '' );
			var empty = '';
			empty +='<h2 class="purple">No upcoming events found!</h2>';
					$('.singleevent').html(empty);	
			eventsNode.text( 'No upcoming community events found.' );
		}
	};
	
	var showEvents = function() {
		var today = new Date();	
					var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
					var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
					var dateTime = date+' '+time;
		function getParameterByName(name, url) {
			if (!url) url = window.location.href;
			name = name.replace(/[\[\]]/g, '\\$&');
			var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
				results = regex.exec(url);
			if (!results) return null;
			if (!results[2]) return '';
			return decodeURIComponent(results[2].replace(/\+/g, ' '));
		}
		var ref = getParameterByName('ref');
		$.ajax( { 
			// get The Events Caleandar REST API root URL 			
			url: 'https://jewishdetroitcalendar.org/wp-json/tribe/events/v1/events/'+ ref, 
			method: 'GET', 
			/*// set the `X-WP-Nonce` header to the nonce value 
			beforeSend: function( xhr ) { 
				xhr.setRequestHeader( 'X-WP-Nonce', restTheme.nonce ); 
			},*/ 
			// set some request data 

			data: { } 
		} )
		// when done render the events list 
		.done( renderEvents ); 
	};  
	$( document ).ready( function() { showEvents(); } ); 
} 
	)( jQuery );