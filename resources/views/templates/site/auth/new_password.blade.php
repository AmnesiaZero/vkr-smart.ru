@extends('layouts.site.main')
@section('content')

    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Восстановление пароля</div>
                        <div class="card-body">
                            <form method="POST" action="/password/new?token={{$token}}">
                                @csrf

                                <div class="form-group">
                                    <label for="password">Новый Пароль</label>
                                    <input id="password" type="password" class="form-control" name="password" required
                                           autocomplete="new-password">
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">
                                        Сбросить Пароль
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
