//standard AJAX call	
	function retrieve_ajax(url) {
		
		console.log('ajax call pending');
		$.getJSON(this.url, null, function(data) {
			
			console.log('ajax call complete');
			
			//spit the response out into the text area and the console
			console.log(data);
			$('#response').text(data);
			
		});
	}
	
	
	//setting the Origin header manually (not allowed)
	function retrieve_ajax_xdomain(url) {
	
		console.log('ajax call pending');		
		
		/*
		$.ajaxSetup({
			beforeSend: function(xhr) {
				xhr.setRequestHeader('Origin', 'http://dotomi.javascriptprototype.com');
			}
		});
		*/
		
		$.ajax({
		
			url: url,
			type: 'GET',
			dataType: 'json',
			crossDomain: true,
			beforeSend: function(xhr){
				xhr.withCredentials = true;
			},
			success: function(data) {
			
				console.log('ajax call complete');
			
				//spit the response out into the text area and the console
				console.log(data);
				$('#response').text(data);
			
			}
			
		
		
		});
	
	
	}
	
	//cross browser compatible version of CORS request.  Only version which supports IE.
	function createCORSRequest (method, url, override) {
		  var xhr = new XMLHttpRequest();
		  if ("withCredentials" in xhr && override != true) {

			// Check if the XMLHttpRequest object has a "withCredentials" property.
			// "withCredentials" only exists on XMLHTTPRequest2 objects.
			
			
			
			
			console.log('with credentials: TRUE');
			xhr.open(method, url, true);
			xhr.withCredentials = true;
			
		  } else if (typeof XDomainRequest != "undefined" || override == true) {

			// Otherwise, check if XDomainRequest.
			// XDomainRequest only exists in IE, and is IE's way of making CORS requests.
			console.log('XDomain Request');
			xhr = new XDomainRequest();
			xhr.open(method, url);
					
			
		  } else {

			// Otherwise, CORS is not supported by the browser.
			console.log('NOT SUPPORTED');
			xhr = null;
			
		  }
		  return xhr;
	}

	
	function xBrowserCORSRequest(method, url, override) {

	  var xhr = createCORSRequest(method, url, override);
	  if (!xhr) {
		alert('CORS not supported');
		return;
	  }

	  // Response handlers.
	  xhr.onload = function() {
		
		var JSONresponse = xhr.responseText;
		console.log('Response from CORS request to ' + url + ': ' + JSONresponse);
		$('#response').text(JSONresponse);
		
	  };

	  xhr.onerror = function() {
		alert('Woops, there was an error making the request.');
	  };

	  xhr.send();
			  
}
	

	
	
	
	
	
	//using jsonp request method.  Doesn't work since the response type is not jsonp
	function jsonp_request(url) {
	
		console.log('ajax call pending');
		$.ajax({
		
			url: url,
			dataType: "jsonp",
			jsonp: 'responseData',
			success: function(data) {	
			
			},
			error: function() { console.log('Uh Oh!'); }
			
		});	
		console.log('ajax call complete');
		
		
	}
	
	//callback function required to do something with the JSONP
	window['responseData'] = function(data) {
		console.log('ajax call complete');
				
				//var responseObj = $.parseJSON(data);
				//spit the response out into the text area and the console
				console.log(data.ResponseType);
				$('#response').text("Response Type: " + data.ResponseType);
	}
	
	
	
	//processing JSON into a table format
	function JSONToText(data) {
		
		var tbl_body = "";
    
		$.each(data, function() {
			var tbl_row = "";
			$.each(this, function(k , v) {
				tbl_row += "<td>"+v+"</td>";
			})
			tbl_body += "<tr>"+tbl_row+"</tr>";                 
		})
		$("#JSONOutput tbody").html(tbl_body);
	
	
	}
