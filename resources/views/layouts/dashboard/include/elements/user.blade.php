<div class="col-xl-3 col-lg-4 col-sm-6 col-12">
    <div class="br-green-light-1 p-3 br-15">
        <div class="d-flex pb-4">
                @if($user->is_active==1)
                    <div class="bg-active br-100">
                    <p class="text-grey fs-14 m-0 px-3">
                        <span><img src="/images/green_active.svg" alt="" class="pe-2"></span>Активен</p>
                    </div>
                @else
                    <div class="bg-error br-100">
                    <p class="text-grey fs-14 m-0 px-3"><span><img src="/images/red.svg" alt=""
                                                                   class="pe-2"></span>Заблокирован</p>
                    </div>
                @endif
        </div>
        <p>{{$user->name}}</p>
        <div class="border-left ps-3 mb-3">
            <p class="text-grey fs-14 mb-1">Группа:
                @if(isset($user->group))
                    {{$user->group}}
                @endif
            </p>
            <p class="text-grey fs-14 mb-1">
                @if(isset($user->date_of_birth))
                    {{$user->date_of_birth}}
                @endif
            </p>
            <p class="text-grey fs-14 mb-1">
                @if(isset($user->email))
                    {{$user->email}}
                @endif
            </p>
        </div>
        <p class="mb-1"><img src="/images/doc_grey_img.svg" alt=""><a href="#"
                                                                      class="text-grey ps-2 fs-14 link-active-hover" onclick="openWorks({{$user->id}})">работы</a>
        </p>
        <p class="mb-1"><img src="/images/User_Card_Id_Grey.svg" alt=""><a href="/dashboard/portfolio/{{$user->id}}"
                                                                           class="text-grey ps-2 fs-14 link-active-hover">портфолио</a>
        </p>
        <p class="mb-1"><img src="/images/setting_grey.svg" alt=""><a href="#"
                                                                      class="text-grey ps-2 fs-14 link-active-hover">управление
                портфолио</a></p>
    </div>
</div>
