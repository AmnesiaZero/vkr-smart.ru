$(document).ready(function () {
    inviteCodes();

});

document.getElementById("copy").onclick = function () {
    let text = document.getElementById("content").value;
    navigator.clipboard.writeText(text);
}



function inviteCodes()
{
    $.ajax({
        url: "/dashboard/invite-codes/get",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if(response.success){
                const inviteCodes = response.data.invite_codes;
                printInviteCodes(inviteCodes,true);
            }
            else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}


function createInviteCodes()
{
    const data = $("#create_invite_codes_form").serialize();
    $.ajax({
        url: "/dashboard/invite-codes/create",
        data: data,
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                const inviteCodes = response.data.invite_codes;
                printInviteCodes(inviteCodes);
            }
            else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}

function printInviteCodes(inviteCodes,create=false)
{
    let teachersListFlag = false;
    let studentsListFlag = false;
    inviteCodes.forEach(inviteCode => {
        const inviteCodeHtml = $("#invite_code_tmpl").tmpl(inviteCode);
        if(inviteCode.type==1)
        {
            if(!studentsListFlag){
                studentsListFlag = true;
                if(!$("#load_students_codes").length){
                    $("#students_list_head").append($("#load_tmpl").tmpl({id:"load_students_codes"}));
                }
            }
            inviteCodeHtml.appendTo("#students_codes_list");
        }
        else {
            if (!teachersListFlag){
                teachersListFlag = true;
                if(!$("#load_teachers_codes").length){
                    $("#teachers_list_head").append($("#load_tmpl").tmpl({id:"load_teachers_codes"}));
                }
            }
            inviteCodeHtml.appendTo("#teachers_codes_list");
        }
    });
    if(create){
        if(!studentsListFlag)
        {
            $("#students_codes_list").append($("#empty_tmpl").tmpl());
        }
        else if (!teachersListFlag)
        {
            $("#teachers_codes_list").append($("#empty_tmpl").tmpl());
        }
        else{
            $(".empty_codes").remove();
        }
    }
}



