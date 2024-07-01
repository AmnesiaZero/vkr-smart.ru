<script id="work_tmpl" type="text/x-jquery-tmpl">
     <tr id="work_${id}">
    <td>${student}</td>
    <td>${protect_date}</td>
    <td>${name}</td>
    <td>${getAssessmentDescription(assessment)}</td>
    <td>${getSelfCheckDescription(self_check)}</td>
        <td>
            <div class="mt-2">
            @{{if report_status==0}}
            <span class="bg-waiting px-2 d-flex align-items-center">
            <div class="me-2 yellow-c">
            </div>
              В очереди на проверку
            </span>
            </div>
            @{{/if}}
            @{{if report_status==1}}
            <span class="bg-active px-2 d-flex align-items-center">
            <div class="me-2 green-c">
            </div>
              Отчет
            </span>
            </div>
            @{{/if}}
            @{{if report_status==2}}
            <span class="bg-error px-2 d-flex align-items-center">
            <div class="me-2 red-c">
            </div>
              Не проверена
            </span>
            </div>
            @{{/if}}

        </td>

    </tr>
</script>
