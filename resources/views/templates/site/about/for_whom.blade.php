@extends('layouts.main')

@section('content')
    <main>
        <div class="container py-5">
            <div class="row">
                @include('layouts.include.menu.about')
                <div class="col-lg-9 px-lg-0 px-4">
                    <div class="block-75">
                        <p class="text-black-black">Программное обеспечение ВКР-ВУЗ.РФ предназначено для:</p>
                        <ul class="text-black fs-14">
                            <li class="pb-1">высших учебных заведений;</li>
                            <li class="pb-1">учереждений среднего профессионального образования;</li>
                            <li class="pb-1">НИИ;</li>
                            <li class="pb-1">организаций, осуществляющих программы дополнительного профессионального
                                образования;
                            </li>
                            <li class="pb-1">любых учебных заведений и учреждений, которым необходимы данные сервисы.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

