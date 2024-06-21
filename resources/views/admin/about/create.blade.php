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

                <form role="form" action="{{ route('store_about') }}" method="post">
                    @csrf

{{-- BLOCK NAME --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Block name</label>
                                <input name="blockName" type="text" class="form-control">
                            </div>
                        </div>
{{-- STATUS  --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>

                                <select name="status" class="form-control"  aria-label="Default select example">
                                    <option selected>Not active</option>
                                    <option value="1">Active</option>
                                    <option value="0">Not active</option>
                                </select>
                            </div>
                        </div>
                    </div>
{{-- TYPE JOB, LANGS --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Info</label>
                                <input name="info" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">CREATE</button>
                </form>
            </div>
        </div>
    </div>

@endsection
