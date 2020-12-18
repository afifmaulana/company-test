@extends('welcome')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Edit Company</h4>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Company</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{ route('companies.update', $data->id) }}">
                                @csrf
                                {{method_field('PATCH')}}

                                <div class="form-group form-float">
                                    <label class="form-label">Nama Perusahaan</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}"
                                               name="name" required placeholder="Masukkan Nama Perusahaan"
                                               value="{{$data->name}}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('name') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">Website</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('website')?'is-invalid':''}}"
                                               name="website" required placeholder="Site Company.com"
                                               value="{{ $data->website }}">
                                        @if ($errors->has('website'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('website') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">Email</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('email')?'is-invalid':''}}"
                                               name="email"
                                               value="{{$data->email}}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('email') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">No Telpon</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('no_telp')?'is-invalid':''}}"
                                               name="no_telp" required placeholder="Masukkan Nomor Telepon"
                                               value="{{$data->no_telp}}">
                                        @if ($errors->has('no_telp'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('no_telp') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">Upload Logo</label>
                                    <div class="form-line">
                                        <input type="hidden" name="old_logo">
                                        <input class="form-control" type="file" name="logo"
                                               onchange="loadfile(event)">
                               <img id="output" src="{{asset('storage/app/company/'.$data->logo)}}" class="img-fluid" height="100" width="100">
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">Alamat</label>
                                    <div class="form-line">
                                        <textarea type="text" class="form-control {{$errors->has('address')?'is-invalid':''}}"
                                               name="address" required placeholder="Masukkan Alamat Perusahaan"
                                               value="{{$data->address}}"></textarea>
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('address') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

<script>
    var loadfile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
