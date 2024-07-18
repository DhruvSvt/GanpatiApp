@extends('admin.layouts.app', ['title' => $title])


@section('content')
    <div class="row">
        <div class="col">
            <!-- **************************************************  Create Form ************************************************** -->
            @isset($create)
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">{{ $title }}</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="live-preview">
                            <form action="{{ route('insurances.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Name</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" placeholder="Enter name" name="name"
                                                required>
                                        </div>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>



                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Image</label>
                                            <input type="file" accept="image/*" class="form-control" name="image" required>
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Category</label>
                                            <select class="form-control" name="cid" required>
                                                <option selected="" value="">-Category-</option>
                                                @foreach ($category as $society)
                                                    <option value="{{ $society->id }}">{{ $society->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        @error('cid')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Short Description</label>
                                            <textarea class="form-control" name="sdescr"></textarea>
                                        </div>
                                        @error('sdescr')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Description</label>
                                            <textarea class="form-control editor" name="description"></textarea>
                                        </div>
                                        @error('sdescr')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            @endisset

            <!-- **************************************************  Edit Form ************************************************** -->
            @isset($edit)
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">{{ $title }}</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="live-preview">
                            <form action="{{ route('insurances.update', $member->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Name</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" value="{{ $member->name }}"
                                                name="name" required>
                                        </div>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!--end col-->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Image</label>
                                            <input type="file" accept="image/*" class="form-control" name="image">
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Category</label>
                                            <select class="form-control" name="cid" required>
                                                <option selected="" value="">-Category-</option>
                                                @foreach ($category as $society)
                                                    <option value="{{ $society->id }}"
                                                        @if ($society->id == $member->cid) selected="" @endif>
                                                        {{ $society->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        @error('cid')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Short Description</label>
                                            <textarea class="form-control" name="sdescr">{{ $member->sdescr }}</textarea>
                                        </div>
                                        @error('sdescr')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Description</label>
                                            <textarea class="form-control editor" name="description">{{ $member->description }}</textarea>
                                        </div>
                                        @error('sdescr')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function getTl(val) {
            $("#tls").html('');
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('getTl') }}",
                data: {
                    "d_id": val
                },

                success: function(data) {
                    $(".tls").html(data);

                }
            });
        }
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
