@extends('dashboard.layout.layout')

@section('body')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
            تعديل
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label class="form-label">اسم</label>
                  <input type="text" name="name" class="form-control rounded" value="{{ $category->name }}">
                </div>
                @if($category->child_count <1)
                <div class="mb-3 ">
                    <select name="parent_id" class="form-select rounded mt-3" aria-label="Default select example">
                        <option selected disabled>قسم</option>
                        @foreach ($mainCategories as $mainCat)
                        <option value="{{ $mainCat->id }}">{{ $mainCat->name }}</option>
                        @endforeach
                      </select>
                </div>
                @endif
                <div class="mb-3">
                    <label for="formFile" class="form-label">صوره</label>
                    <input name="image" class="form-control dropify rounded" data-default-image ="{{ asset($category->image)  }}" type="file" id="formFile">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>

    </div>
    </div>
</div>


@endsection
