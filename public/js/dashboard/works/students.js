$(document).ready(function () {

});


function works() {
    $.ajax({
        url: "/dashboard/works/get",
        type: "GET",
        dataType: "json",
        data: data,
        success: function (response) {
            if (response.success) {
                const inviteCodes = response.data.data;
                printInviteCodes(inviteCodes, true);
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}
