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
        url: "http://localhost/laraveladmin/public/admin/usersList",
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
            // showLoader();
        },
        success: function (request, status, errorThrown) {
            $(".content").html(request);
            console.log(status)
            // hideLoader();
        },
        error: function (request, status, errorThrown) {
            if (request.status == 401) {
                //Redirect to login page 
                window.location.href = FMconfig.BASEURL + "/admin?msg=" + encodeURIComponent(request.responseJSON.message);
            }
            if (request.status == 403) {
                //Redirect to login page
                window.location.href = FMconfig.BASEURL + "/admin/dashboard";
            }
        }
    });

}
