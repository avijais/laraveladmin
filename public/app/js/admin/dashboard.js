// console.log(response.data.api_token);
$(document).on('submit', 'form#loginForm', function(e){
    e.preventDefault();
    // alert("hello")
    // console.log($('#loginForm').serialize())
    // console.log(BASEURL + "admin/loginApi")
    // e.preventdefault()
    $.ajax({
        url : BASEURL + "admin/loginApi",
        data: $(this).serializeArray(),
        type : 'POST',
        statusCode: {
                404: function() {
                    alert(['page not found']);
                },
                500: function(){
                    alert('Internal server error');
                }
            },
        beforeSend : function(){
            alert("before send")
            // return false
        },
        success : function(data){
            console.log(data.data)
            if(data.hasOwnProperty('status')){
                if(data.hasOwnProperty('redirectTo')){
                    // Reference to set deafult header for each request
                    // -------------http://stackoverflow.com/questions/7686827/how-can-i-add-a-custom-http-header-to-ajax-request-with-js-or-jquery
                    // $.ajaxSetup({
                    //     headers: { 'Authorization': 'Bearer'  + data.data.api_token}
                    // });

                    window.location.href = BASEURL + data.redirectTo
                }
            }
        },
        error : function(){

        }
    })
})

$(document).ready(function () {
    if(window.location.href.indexOf("dashboard") > -1) {
       $('body').removeClass('login-page')
       $('body').addClass('skin-blue sidebar-mini')
    }
});

$(document).on('click', '.registerNewMember', function(){
    $('body').removeClass('login-page')
    $('body').addClass('register-page')
})

$('body').on('click', '#user_mgt', function(){
    usermanagement();
});

function usermanagement(){

    $.ajax({
        url: BASEURL + "admin/usersList",
        type: 'GET',
        statusCode: {
            404: function () {
                alert("page not found");
            },
            500: function () {
                alert("Internal server error");
            }
        },
        beforeSend: function (xhr) {
            // xhr.setRequestHeader("Accept","application/vvv.website+json;version=1");
            // xhr.setRequestHeader("Authorization","Token token=\"FuHCLyY46\"");   
            // xhr.setRequestHeader('Authorization','Bearer ' + response.data.api_token);
            // showLoader();
        },
        success: function (request, status, errorThrown) {
            $(".content").html('');
            $(".content").html(request);
            // console.log(status)
            // hideLoader();
        },
        error: function (request, status, errorThrown) {
            if (request.status == 401) {
                //Redirect to login page 
                // window.location.href = FMconfig.BASEURL + "/admin?msg=" + encodeURIComponent(request.responseJSON.message);
                window.location.href = BASEURL + "/admin";
            }
            if (request.status == 403) {
                //Redirect to login page
                window.location.href = BASEURL + "/admin";
            }
        }
    });

}

