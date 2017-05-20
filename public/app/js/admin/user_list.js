$(document).ready(function() {
    $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "http://localhost/laraveladmin/public/admin/fetchUsers"
    });
} );