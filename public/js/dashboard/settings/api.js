function generateApiKey() {
    console.log('Вошёл в функцию открытия canvas');
    const data = $("#generate_key_form").serialize();
    $.ajax({
        url: "/dashboard/users/jwt/generate",
        data: data,
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const data = response.data;
                $("#generate_key_form").append($("#jwt_tmpl").tmpl(data));
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}
