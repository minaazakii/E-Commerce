@extends('dashboard.layout.layout')

@section('body')
    <div class="row">
        <div class="card">
            <div class="card-header">
                        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                اضافه قسم
            </button>
        </div>
            <!--store Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافه قسم جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                          <label class="form-label">اسم</label>
                                          <input type="email" class="form-control rounded">
                                        </div>
                                        <div class="mb-3 ">
                                            <select class="form-select rounded mt-3" aria-label="Default select example">
                                                <option selected>قسم</option>
                                                @foreach($mainCategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                              </select>
                                        </div>
                                        <div class="">
                                            <label for="formFile" class="form-label">صوره</label>
                                            <input class="form-control dropify rounded" type="file" id="formFile">
                                          </div>
                                </div>

                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
                </div>
            </div>

                    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Launch demo modal
        </button>

        <!-- delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route("dashboard.category.delete") }}" method="POST">
                @csrf
                @method('DELETE')
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                متأكد من مسح؟؟
                <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                <button type="submit" class="btn btn-primary">حذف</button>
                </div>
            </form>
            </div>
            </div>
        </div>


        <div class="col-12">
            <div class="container">
                <div class="card-body">
                <table  id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">name</th>
                            <th scope="col">image</th>
                            <th scope="col">action</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $(function()
    {
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dashboard.category.ajaxCategory') }}",
            columns:
            [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data:'image',
                    name:'image'
                },
                {
                    data:'action',
                    name:'action'
                },
                {
                    data:'action2',
                    name:'action2'

                }
            ]
        });
    });

    $('#table tbody').on('click','#deleteBtn',function()

    {
        var id = $(this).data('id');
        $('#deleteModal #id').val(id);

    })

</script>



@endpush
