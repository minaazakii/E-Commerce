@extends('dashboard.layout.layout')

@section('body')
   <div class="row">
    <div class="col-12">
        @if($errors->any())
        @foreach ($errors->all() as$error )
            <p>{{ $error }}</p>
        @endforeach
        @endif
        <form action="{{ route('dashboard.product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">

              <select name="category_id" class="form-select rounded mt-3" aria-label="Default select example">
                <option selected disabled>قسم</option>
                @foreach ($mainCategories as $mainCat)
                <option value="{{ $mainCat->id }}">{{ $mainCat->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">صوره</label>
                <input name="image" class="form-control dropify rounded" data-default-image ="" type="file" id="formFile">
              </div>
              <div class="mb-3 ">
                <label> اسم المنتج</label>
                  <input name="name" type="text" class="form-control">
            </div>

            <div class="mb-3 ">
                <label>وصف المنتج</label>
                  <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label class="mb-3">السعر</label>
                <input name="price" class="form-control" type="text" name="" id="">
            </div>

            <div class="mb-3">
                <label class="mb-3">التخفيض</label>
                <input name="discount_price" class="form-control" type="text" name="" id="">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
   </div>
@endsection
