@extends('dashboard.layout.layout')

@section('body')
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>اعدادات</h5>
            </div>
                    <div class="card-body">
                        <div class="container" style="margin: auto">

                            @foreach ($errors->all() as $error )
                                {{ $error }} <br>
                            @endforeach
                            <form action="{{ route('dashboard.settings.update',$setting) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">الاسم</label>
                                    <input type="text" name="name" class="form-control"value="{{ $setting->name }}" >
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">لوجو الموقع</label>
                                    <input type="file" name="logo" class="form-control border-0 dropify"value="{{ $setting->logo }}" id="inputGroupFile01"
                                    data-default-file="{{ asset($setting->logo) }}">

                                </div>

                                <div class="form-control border-0">
                                    <label for="">وصف الموقع</label>
                                    <textarea name="description" class="form-control mb-3" id="floatingTextarea">{{ $setting->description }}</textarea>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text " for="inputGroupFile01">لوجو مصغر</label>
                                    <input type="file" name="favicon" class="form-control border-0 dropify"value="{{ $setting->favicon }}" id="inputGroupFile01"
                                    data-default-file="{{ asset($setting->favicon) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">ايمال</label>
                                    <input name="email" type="text" class="form-control"value="{{ $setting->email }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">الهاتف</label>
                                    <input name="phone" type="text" class="form-control"value="{{ $setting->phone }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">عنوان</label>
                                    <input name="address" type="text" class="form-control"value="{{ $setting->address }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">facebook</label>
                                    <input name="facebook" type="text" class="form-control"value="{{ $setting->facebook }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">youtube</label>
                                    <input name="youtube" type="text" class="form-control"value="{{ $setting->youtube }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">twitter</label>
                                    <input name="twitter" type="text" class="form-control"value="{{ $setting->twitter }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">instagram</label>
                                    <input name="instagram" type="text" class="form-control"value="{{ $setting->instagram }}">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">tiktok</label>
                                    <input name="tiktok" type="text" class="form-control"value="{{ $setting->tiktok }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
