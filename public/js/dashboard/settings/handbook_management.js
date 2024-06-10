var addBadge = function () {
    let text = document.getElementById("content").value;
    var elemOutKod = document.querySelector('.out-kod');

    elemOutKod.innerHTML += '<div class="badge text-black-black bg-green-light br-100 fs-12 me-3 mb-3" onclick="this.remove(this)">' + text + '<button class="close-badge btn"></button></div>';
}

function checkForEnter(e) {
    if (e.keyCode == 13) {
        console.log(this.value);
        addBadge();
    }
}

var addBadge_1 = function () {
    let text = document.getElementById("content_1").value;
    var elemOutKod_1 = document.querySelector('.out-kod_1');

    elemOutKod_1.innerHTML += '<div class="badge text-black-black bg-green-light br-100 fs-12 me-3 mb-3" onclick="this.remove(this)">' + text + '<button class="close-badge btn"></button></div>';
}

function checkForEnter_1(e) {
    if (e.keyCode == 13) {
        console.log(this.value);
        addBadge_1();
    }
}


function addScientificAdvisor()
{
    const data = $("#add_scientific_advisor_form").serialize();
    $.ajax({
        url: "/dashboard/scientific-supervisors/create",
        dataType: "json",
        data: data,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                const scientificSupervisor = response.data.scientific_supervisor;
                $("#scientific_supervisors_list").append($("#scientific_supervisor_tmpl").tmpl(scientificSupervisor));
            }
            else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("При загрузке информации об организации произошла ошибка", "error");
        }
    });
}

function addWorksType()
{
    const data = $("#add_works_type_form").serialize();
    $.ajax({
        url: "/dashboard/work-types/create",
        dataType: "json",
        data: data,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                const worksType = response.data.works_type;
                $("#works_types_list").append($("#works_type_tmpl").tmpl(worksType));
            }
            else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("При загрузке информации об организации произошла ошибка", "error");
        }
    });
}
