@extends('layouts.main')
@section('content')
<main>
    <div class="container py-5 mb-5">
        <div class="row">
            <div class="col-lg-12 px-lg-0 px-4">
                <h3>Введите код проверки</h3>
                <div class="row">
                    <div class="col-sm-3">
                        <form class="form" id="checkForm" onsubmit="getReference(); return false;">
                            <div class="form-group">

                                <input id="code" value="" type="text" class="form-control" style="font-size:18px;height:50px;" placeholder="Введите проверочный код" required="">
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn  btn-lg btn-block btn-success" type="submit">Проверить</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-sm-9">
                        <div id="alerts"></div>
                        <iframe id="bseFullReportIframe" style="width:100%;height:100%;min-height:600px;border:0;" width="100%" height="100%"></iframe>
                    </div>
                    <div>
{{--                        <script async="" src="./ВКР-ВУЗ.РФ _ Проверка справки_files/tag.js.загружено"></script><script type="text/javascript">--}}
{{--                            function getReference(id){--}}
{{--                                $("#alerts").html("");--}}
{{--                                $.ajax({--}}
{{--                                    url : "/reference-actions",--}}
{{--                                    data : "action=checkReference&code="+$("#code").val(),--}}
{{--                                    dataType : "json",--}}
{{--                                    type : "post",--}}
{{--                                    success : function(response){--}}
{{--                                        if(response.success){--}}
{{--                                            $("#bseFullReportIframe").attr("src",response.address);--}}
{{--                                        }else{--}}
{{--                                            $("#alerts").html('<div class="alert alert-danger">'+response.message+'</div>');--}}
{{--                                            $("#bseFullReportIframe").attr("src",'');--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                });--}}
{{--                            }--}}
{{--                        </script>--}}
                    </div>
                </div>
            </div>
        </div></div>
</main>
@endsection
