@extends('dashboard.layout.layout')

@section('body')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
            تعديل
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                  <label class="form-label">اسم</label>
                  <input type="email" class="form-control rounded">
                </div>
                <div class="mb-3 ">
                    <select class="form-select rounded mt-3" aria-label="Default select example">
                        <option selected>قسم</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">صوره</label>
                    <input class="form-control dropify rounded" type="file" id="formFile">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>

    </div>
    </div>
</div>


@endsection
