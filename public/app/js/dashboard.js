$('body').on('click', '#user_mgt', function(){
    $.ajax({
        url: "http://localhost/laraveladmin/public/getAllUsers",
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
        success: function (data) {
            $(".content").html(data);
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
});