

function updateUser(id) {
    let data = $("#update_user_form").serialize();
    let additionalData = {
        id: id,
    };
    data += '&' + $.param(additionalData);
    updateUserCore(id,data);
}

function blockUser(id)
{
    const data = {
        id:id,
        is_active:0
    }
    updateUserCore(id,data);
}

function unblockUser(id)
{
    const data = {
        id:id,
        is_active:1
    }
    updateUserCore(id,data);
}


function updateUserCore(id,data)
{
    $.ajax({
        url: "/dashboard/users/update",
        data: data,
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                const user = response.data.user;
                const userHtml = $("#user_" + id);
                const updatedContent = $("#user_tmpl").tmpl(user);
                userHtml.replaceWith(updatedContent);
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

function resetUserPassword(email)
{
    const data = {
        email:email,
    }
    $.ajax({
        url: "/mail/reset-password",
        data: data,
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                $.notify(response.data.title + ":" + response.data.message, "success");
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

