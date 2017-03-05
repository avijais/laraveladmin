var BASEURL = 'http://localhost/laraveladmin/public/';

$.ajaxPrefilter(function( options ) {
    // if ( !options.beforeSend) {
        options.beforeSend = function (xhr) { 
            // xhr.setRequestHeader('CUSTOM-HEADER-KEY', 'CUSTOM-HEADER-VALUE');
            // xhr.setRequestHeader('Authorization','Bearer ' + response.data.api_token);
        }
    // }
});


/**
 *Reference : https://laracasts.com/discuss/channels/general-discussion/ajax-token-mismatch-vanilla-javascript
 *SET HEADER FOR EACH REQUEST
 *
 */
 /*
	var token = document.getElementsByTagName('input').item(name="_token").value;
    var data = "_token="+token;

    xmlhttp.open("POST", "ajax/myFunction", true);
    xmlhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(data);
    */