@extends('admin.admin_basic')

@section('content')

    <!-- right column -->
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create About</h3>
            </div>

            <div class="card-body">

                <form role="form" action="{{ route('store_setting') }}" method="post">
                    @csrf
{{-- NAME --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control">
                            </div>
                        </div>
{{-- VALUE  --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Value</label>
                                <input name="value" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
{{-- TYPE JOB, LANGS --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input name="description" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">CREATE</button>
                </form>
            </div>
        </div>
    </div>

@endsection
