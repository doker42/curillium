@extends('admin.admin_basic')

@section('content')

    <!-- right column -->
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Setting</h3>
            </div>

            <div class="card-body">

                @if(isset($setting))

                    <form role="form" action="{{ route('update_setting', $setting->id) }}" method="post">
                        @csrf
                        <div class="row">
                            {{-- ABOUT INFO  --}}
                            <div class="col-sm-12">
                                 <div class="form-group">
                                    <label>Setting name</label>
                                    <textarea name="name" class="form-control" >{{ $setting->name }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Setting value</label>
                                    <textarea name="value" class="form-control" >{{ $setting->value }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Setting description</label>
                                    <textarea name="description" class="form-control" >{{ $setting->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </form>
                @endif
            </div>
        </div>
    </div>


@endsection
