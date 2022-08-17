@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="background-color: #11233b;padding:20px 10px">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-Header-tab" data-bs-toggle="pill" data-bs-target="#pills-Header" type="button" role="tab" aria-controls="pills-Header" aria-selected="true">{{ __('lang.Header(First Section)') }}</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-Services-tab" data-bs-toggle="pill" data-bs-target="#pills-Services" type="button" role="tab" aria-controls="pills-Services" aria-selected="false">{{ __('lang.Services(second Section)') }}</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-How-It-Works-tab" data-bs-toggle="pill" data-bs-target="#pills-How-It-Works" type="button" role="tab" aria-controls="pills-How-It-Works" aria-selected="false">{{  __('lang.How it Works ( Third Section )') }}</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-Why-Use-Awen-tab" data-bs-toggle="pill" data-bs-target="#pills-Why-Use-Awen" type="button" role="tab" aria-controls="pills-Why-Use-Awen" aria-selected="false">{{ __('lang.Why Use Awen ( Fourth Section )') }}</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-integrate-with-tab" data-bs-toggle="pill" data-bs-target="#pills-integrate-with" type="button" role="tab" aria-controls="pills-integrate-with" aria-selected="false">{{ __('lang.We integrate with( Fifth Section )') }}</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-Extra-Mile-tab" data-bs-toggle="pill" data-bs-target="#pills-Extra-Mile" type="button" role="tab" aria-controls="pills-Extra-Mile" aria-selected="false">{{ __('lang.Extra Mile ( Sixth Section )') }}</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-Powerful-Platform-tab" data-bs-toggle="pill" data-bs-target="#pills-Powerful-Platform" type="button" role="tab" aria-controls="pills-Powerful-Platform" aria-selected="false">{{ __('lang.Powerful Platform ( Seventh Section )') }}</button>
        </li>
    </ul>


    <div class="tab-content" id="pills-tabContent">
        {{-- Header(First-Section) --}}
        <div class="tab-pane fade show active" id="pills-Header" role="tabpanel" aria-labelledby="pills-Header-tab">
            <div class="row">
                <div class="col-md-12 row shadow main-box pb-3">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> {{ __('lang.Edit') }} {{ __('lang.Header(First Section)') }}
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>
                    <form action="{{ route('admin.update_header') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6 form-floating mb-3">
                                <input type="text" name="title[ar]" class="form-control" placeholder="{{ __('lang.title') }}" id="{{ __('lang.title') }}" value="{{ $header['title']->ar }}">
                                <label for="{{ __('lang.title') }}">{{ __('lang.title') }} (AR)</label>
                            </div>
                            <div class="col-md-6 form-floating mb-3">
                                <input type="text" name="title[en]" class="form-control" placeholder="{{ __('lang.title') }}" id="{{ __('lang.title') }}" value="{{ $header['title']->en }}">
                                <label for="{{ __('lang.title') }}">{{ __('lang.title') }} (EN)</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 form-floating mb-3">
                                <textarea class="form-control" name="description[ar]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $header['description']->ar}}</textarea>
                                <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (AR)</label>
                            </div>

                            <div class="col-md-6 form-floating mb-3">
                                <textarea class="form-control" name="description[en]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $header['description']->en}}</textarea>
                                <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (EN)</label>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" name="video_link" placeholder="{{ __('lang.video_link') }}" id="{{ __('lang.video_link') }}" value="{{ $header['video_link']}}">
                            <label for="{{ __('lang.video_link') }}">{{ __('lang.video_link') }}</label>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-fluid" src="{{ url('storage/uploads/home_page/'.$header['main_image']) }}"/>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="{{ __('lang.upload main image') }}">{{ __('lang.upload main image') }}</label>
                            <input type="file" name="main_image" accept="image/*" class="form-control" id="{{ __('lang.upload main image') }}">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h5>{{ __('lang.images animated background') }}<hr style="width: 30%"></h5>
                            </div>
                            @foreach ($imgs_Header as $img )
                                <div class="col-sm-3 col-md-2 p-4 text-center">
                                    <a href="{{ route('admin.delete_img',$img->id) }}" class="btn  btn-outline-danger btn-sm font-1 mx-1">
                                        <span class="fas fa-trash "></span> {{ __('lang.Delete') }}
                                    </a>
                                    <img class="img-fluid" src="{{ url('storage/uploads/home_page/'.$img->img) }}"/>
                                </div>
                            @endforeach
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="{{ __('lang.upload images bg Header') }}">{{ __('lang.upload images bg Header') }}</label>
                            <input type="file" name="images[]" multiple accept="image/*" class="form-control" id="{{ __('lang.upload images bg Header') }}">
                        </div>

                        <button class="btn btn-success" id="submitEvaluation">{{ __('lang.save') }}</button>

                    </form>
                </div>
            </div>
        </div>
        {{-- End Header(First-Section)  --}}


        {{-- Start Services Section --}}
        <div class="tab-pane fade" id="pills-Services" role="tabpanel" aria-labelledby="pills-Services-tab">
            <div class="row">
                <div class="col-md-12 row shadow main-box pb-3">
                    <div class="col-12 row px-0">
                        <div class="col-md-6 px-3 py-3">
                            <span class="fas fa-info-circle"></span> {{ __('lang.Edit') }} {{ __('lang.Services(second Section)') }}
                        </div>
                        <div class="col-md-6 " >

                        </div>
                    </div>
                    <form action="{{ route('admin.update_services_description') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6 form-floating mb-3">
                                <textarea class="form-control" name="description[ar]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $Desc_services_section->ar}}</textarea>
                                <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (AR)</label>
                            </div>

                            <div class="col-md-6 form-floating mb-3">
                                <textarea class="form-control" name="description[en]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $Desc_services_section->en}}</textarea>
                                <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (EN)</label>
                            </div>
                        </div>
                        <button class="btn btn-success" id="submitEvaluation">{{ __('lang.save') }}</button>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddServices">
                            {{ __('lang.Add new') }}
                        </button>

                    </form>

                    <br>
                    <div class="row">
                        <div class="col-12 p-3" style="overflow:auto">
                            <div class="col-12 p-0" >
                                <table class="table table-bordered  table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('lang.icon') }}</th>
                                            <th>{{ __('lang.serv_name') }}</th>
                                            <th>{{ __('lang.description') }}</th>
                                            <th>{{ __('lang.control') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service['id'] }}</td>
                                            <td><img style="width: 100px" src="{{ url('storage/uploads/home_page/'.$service['icon']) }}"/> </td>
                                            <td>{{ Session()->get('lang_code')=='en'? $service['serv_title']->en: $service['serv_title']->ar }}</td>
                                            <td>{{ Session()->get('lang_code')=='en'? $service['serv_desc']->en: $service['serv_desc']->ar }}</td>

                                            <td style="width: 270px;">
                                                <a data-bs-toggle="modal" data-bs-target="#updateServices{{ $service['id'] }}">
                                                    <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                        <span class="fas fa-wrench "></span> {{ __('lang.Edit') }}
                                                    </span>
                                                </a>

                                                <a href="{{ route('admin.delete_service',$service['id']) }}" class="btn btn-outline-danger btn-sm font-1 mx-1">
                                                    <span class="fas fa-trash "></span> {{ __('lang.Delete') }}
                                                </a>

                                            </td>
                                        </tr>
                                          <!--Start Modal Edit and Update Services -->
                                            <div class="modal fade" id="updateServices{{ $service['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{ __('lang.Add Services') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('admin.update_services',$service['id']) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                                                        @csrf
                                                        <div class="modal-body">



                                                            <div class="form-group row">
                                                                <div class="col-12 form-floating mb-3">
                                                                    <img class="img-fluid" src="{{ url('storage/uploads/home_page/'.$service['icon']) }}"/>
                                                                </div>
                                                                <div class="col-12 input-group mb-3">
                                                                    <label class="input-group-text" for="{{ __('lang.upload image') }}">{{ __('lang.upload image') }}</label>
                                                                    <input type="file" name="icon" accept="image/*" class="form-control" id="{{ __('lang.upload image') }}">
                                                                </div>

                                                                <div class="col-md-6 form-floating mb-3">
                                                                    <input type="text" name="serv_title[ar]" class="form-control" placeholder="{{ __('lang.serv_name') }}" id="{{ __('lang.serv_name') }}" value="{{ $service['serv_title']->ar }}">
                                                                    <label for="{{ __('lang.serv_name') }}">{{ __('lang.serv_name') }} (AR)</label>
                                                                </div>
                                                                <div class="col-md-6 form-floating mb-3">
                                                                    <input type="text" name="serv_title[en]" class="form-control" placeholder="{{ __('lang.serv_name') }}" id="{{ __('lang.serv_name') }}" value="{{ $service['serv_title']->en }}">
                                                                    <label for="{{ __('lang.serv_name') }}">{{ __('lang.serv_name') }} (EN)</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-md-6 form-floating mb-3">
                                                                    <textarea class="form-control" name="serv_desc[ar]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $service['serv_desc']->ar }}</textarea>
                                                                    <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (AR)</label>
                                                                </div>

                                                                <div class="col-md-6 form-floating mb-3">
                                                                    <textarea class="form-control" name="serv_desc[en]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $service['serv_desc']->en }}</textarea>
                                                                    <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (EN)</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('lang.cancel') }}</button>
                                                        <button type="submit" id="submitEvaluation" class="btn btn-success">{{ __('lang.save') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            <!--End Modal Edit and Update Service -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- End Services Section --}}

        {{-- Start How-It-Works  --}}
        <div class="tab-pane fade" id="pills-How-It-Works" role="tabpanel" aria-labelledby="pills-How-It-Works-tab">
            <div class="row">
                <div class="col-md-12 row shadow main-box pb-3">
                    <div class="col-12 row px-0">
                        <div class="col-md-6 px-3 py-3">
                            <span class="fas fa-info-circle"></span> {{ __('lang.Edit') }} {{ __('lang.How it Works ( Third Section )') }}
                        </div>
                        <div class="col-md-6 " >
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddWork">
                                {{ __('lang.Add new') }}
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-3" style="overflow:auto">
                            <div class="col-12 p-0" >
                                <table class="table table-bordered  table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('lang.Image') }}</th>
                                            <th>{{ __('lang.Work Name') }}</th>
                                            <th>{{ __('lang.description') }}</th>
                                            <th>{{ __('lang.control') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Works as $Work)
                                        <tr>
                                            <td>{{ $Work['id'] }}</td>
                                            <td><img width="100px" src="{{ url('storage/uploads/home_page/'.$Work['img']) }}"> </td>
                                            <td>{{ Session()->get('lang_code')=='en'? $Work['title']->en: $Work['title']->ar }}</td>
                                            <td>{{ Session()->get('lang_code')=='en'? $Work['description']->en: $Work['description']->ar }}</td>

                                            <td style="width: 270px;">
                                                <a data-bs-toggle="modal" data-bs-target="#updateWork{{ $Work['id'] }}">
                                                    <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                        <span class="fas fa-wrench "></span> {{ __('lang.Edit') }}
                                                    </span>
                                                </a>

                                                <a href="{{ route('admin.delete_work',$Work['id']) }}" class="btn btn-outline-danger btn-sm font-1 mx-1">
                                                    <span class="fas fa-trash "></span> {{ __('lang.Delete') }}
                                                </a>

                                            </td>
                                        </tr>
                                          <!--Start Modal Edit and Update Services -->
                                            <div class="modal fade" id="updateWork{{ $Work['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{-- __('lang.AddServices') --}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('admin.update_Work',$Work['id']) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                                                        @csrf
                                                        <div class="modal-body">


                                                            <div class="form-group row">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <img class="img-fluid" src="{{ url('storage/uploads/home_page/'.$Work['img']) }}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <label class="input-group-text" for="{{ __('lang.upload image Work') }}">{{ __('lang.upload image Work') }}</label>
                                                                    <input type="file" name="img" accept="image/*" class="form-control" id="{{ __('lang.upload image Work') }}">
                                                                </div>


                                                                <div class="col-md-6 form-floating mb-3">
                                                                    <input type="text" name="title[ar]" class="form-control" placeholder="{{ __('lang.Work Name') }}" id="{{ __('lang.Work Name') }}" value="{{ $Work['title']->ar }}">
                                                                    <label for="{{ __('lang.Work Name') }}">{{ __('lang.Work Name') }} (AR)</label>
                                                                </div>
                                                                <div class="col-md-6 form-floating mb-3">
                                                                    <input type="text" name="title[en]" class="form-control" placeholder="{{ __('lang.Work Name') }}" id="{{ __('lang.Work Name') }}" value="{{ $Work['title']->en }}">
                                                                    <label for="{{ __('lang.Work Name') }}">{{ __('lang.Work Name') }} (EN)</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-md-6 form-floating mb-3">
                                                                    <textarea class="form-control" name="description[ar]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $Work['description']->ar }}</textarea>
                                                                    <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (AR)</label>
                                                                </div>

                                                                <div class="col-md-6 form-floating mb-3">
                                                                    <textarea class="form-control" name="description[en]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $Work['description']->en }}</textarea>
                                                                    <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (EN)</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('lang.cancel') }}</button>
                                                        <button type="submit" id="submitEvaluation" class="btn btn-success">{{ __('lang.save') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            <!--End Modal Edit and Update Service -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- End How-It-Works  --}}

        {{-- Start Why-Use-Awen --}}
            <div class="tab-pane fade" id="pills-Why-Use-Awen" role="tabpanel" aria-labelledby="pills-Why-Use-Awen-tab">
                <div class="row">
                    <div class="col-md-12 row shadow main-box pb-3">
                        <div class="col-12 row px-0">
                            <div class="col-md-6 px-3 py-3">
                                <span class="fas fa-info-circle"></span> {{ __('lang.Edit') }} {{ __('lang.Why Use Awen ( Fourth Section )') }}
                            </div>
                            <div class="col-md-6 " >

                            </div>
                        </div>
                        <form action="{{ route('admin.update_why_use_awen_description') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6 form-floating mb-3">
                                    <textarea class="form-control" name="description[ar]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $Desc_why_use_awen_section->ar}}</textarea>
                                    <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (AR)</label>
                                </div>

                                <div class="col-md-6 form-floating mb-3">
                                    <textarea class="form-control" name="description[en]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $Desc_why_use_awen_section->en}}</textarea>
                                    <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (EN)</label>
                                </div>
                            </div>
                            <button class="btn btn-success" id="submitEvaluation">{{ __('lang.save') }}</button>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_why_use_awen">
                                {{ __('lang.Add new') }}
                            </button>

                        </form>

                        <br>
                        <div class="row">
                            <div class="col-12 p-3" style="overflow:auto">
                                <div class="col-12 p-0" >
                                    <table class="table table-bordered  table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('lang.Image Icon') }}</th>
                                                <th>{{ __('lang.serv_name') }}</th>
                                                <th>{{ __('lang.description') }}</th>
                                                <th>{{ __('lang.control') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Why_Use_Awen as $service)
                                            <tr>
                                                <td>{{ $service['id'] }}</td>
                                                <td><img width="100px" src="{{ url('storage/uploads/home_page/'.$service['img_icon']) }}"> </td>
                                                <td>{{ Session()->get('lang_code')=='en'? $service['serv_title']->en: $service['serv_title']->ar }}</td>
                                                <td>{{ Session()->get('lang_code')=='en'? $service['serv_desc']->en: $service['serv_desc']->ar }}</td>

                                                <td style="width: 270px;">
                                                    <a data-bs-toggle="modal" data-bs-target="#update_why_use_awen{{ $service['id'] }}">
                                                        <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                            <span class="fas fa-wrench "></span> {{ __('lang.Edit') }}
                                                        </span>
                                                    </a>

                                                    <a href="{{ route('admin.delete_why_use_awen',$service['id']) }}" class="btn btn-outline-danger btn-sm font-1 mx-1">
                                                        <span class="fas fa-trash "></span> {{ __('lang.Delete') }}
                                                    </a>

                                                </td>
                                            </tr>
                                              <!--Start Modal Edit and Update why_use_awen -->
                                                <div class="modal fade" id="update_why_use_awen{{ $service['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">{{ __('lang.Edit') }} => {{ __('lang.Why Use Awen') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <form action="{{ route('admin.update_why_use_awen',$service['id']) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                                                            @csrf
                                                            <div class="modal-body">

                                                                <div class="form-group row">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <img class="img-fluid" src="{{ url('storage/uploads/home_page/'.$service['img_icon']) }}"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <label class="input-group-text" for="{{ __('lang.upload image') }}">{{ __('lang.upload image') }}</label>
                                                                        <input type="file" name="img_icon" accept="image/*" class="form-control" id="{{ __('lang.upload image') }}">
                                                                    </div>

                                                                    <div class="col-md-6 form-floating mb-3">
                                                                        <input type="text" name="serv_title[ar]" class="form-control" placeholder="{{ __('lang.serv_name') }}" id="{{ __('lang.serv_name') }}" value="{{ $service['serv_title']->ar }}">
                                                                        <label for="{{ __('lang.serv_name') }}">{{ __('lang.serv_name') }} (AR)</label>
                                                                    </div>
                                                                    <div class="col-md-6 form-floating mb-3">
                                                                        <input type="text" name="serv_title[en]" class="form-control" placeholder="{{ __('lang.serv_name') }}" id="{{ __('lang.serv_name') }}" value="{{ $service['serv_title']->en }}">
                                                                        <label for="{{ __('lang.serv_name') }}">{{ __('lang.serv_name') }} (EN)</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <div class="col-md-6 form-floating mb-3">
                                                                        <textarea class="form-control" name="serv_desc[ar]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $service['serv_desc']->ar }}</textarea>
                                                                        <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (AR)</label>
                                                                    </div>

                                                                    <div class="col-md-6 form-floating mb-3">
                                                                        <textarea class="form-control" name="serv_desc[en]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $service['serv_desc']->en }}</textarea>
                                                                        <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (EN)</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('lang.cancel') }}</button>
                                                            <button type="submit" id="submitEvaluation" class="btn btn-success">{{ __('lang.save') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                                <!--End Modal Edit and Update Service -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        {{-- End Why-Use-Awen --}}

        {{-- Start integrate-with --}}
        <div class="tab-pane fade" id="pills-integrate-with" role="tabpanel" aria-labelledby="pills-integrate-with-tab">
            <div class="row">
                <div class="col-md-12 row shadow main-box pb-3">
                    <div class="col-12 row px-0">
                        <div class="col-md-6 px-3 py-3">
                            <span class="fas fa-info-circle"></span> {{ __('lang.Edit') }} {{ __('lang.We integrate with( Fifth Section )') }}
                        </div>
                        <div class="col-md-6" >

                        </div>
                    </div>

                    <form action="{{ route('admin.create_integrate_with') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="{{ __('lang.upload image') }}">{{ __('lang.upload image') }}</label>
                            <input type="file" name="img_integrate[]" multiple accept="image/*" class="form-control" id="{{ __('lang.upload image') }}">
                        </div>

                        <button type="submit" id="submitEvaluation" class="btn btn-success">{{ __('lang.save') }}</button>
                    </form>

                    <br>

                    <br>
                        <div class="row">
                            <div class="col-12 p-3" style="overflow:auto">
                                <div class="col-12 p-0" >
                                    <table class="table table-bordered  table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('lang.Image') }}</th>
                                                <th>{{ __('lang.control') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($integrate_imgs as $img)
                                            <tr>
                                                <td>{{ $img['id'] }}</td>
                                                <td><img width="100px" src="{{ url('storage/uploads/home_page/'.$img['img']) }}"> </td>
                                                <td style="width: 270px;">
                                                    <a href="{{ route('admin.delete_integrate_with',$img['id']) }}" class="btn btn-outline-danger btn-sm font-1 mx-1">
                                                        <span class="fas fa-trash "></span> {{ __('lang.Delete') }}
                                                    </a>

                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        {{-- End integrate-with --}}

        {{-- Start Extra-Mile --}}
        <div class="tab-pane fade" id="pills-Extra-Mile" role="tabpanel" aria-labelledby="pills-Extra-Mile-tab">
            <div class="row">
                <div class="col-md-12 row shadow main-box pb-3">
                    <div class="col-12 row px-0">
                        <div class="col-md-6 px-3 py-3">
                            <span class="fas fa-info-circle"></span> {{ __('lang.Edit') }} {{ __('lang.Extra Mile ( Sixth Section )') }}
                        </div>
                        <div class="col-md-6" >

                        </div>
                    </div>

                    <form action="{{ route('admin.create_extra_mile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-floating mb-3">
                                <input type="text" name="title[ar]" class="form-control" placeholder="{{ __('lang.title') }}" id="{{ __('lang.title') }}">
                                <label for="{{ __('lang.title') }}">{{ __('lang.title') }} (AR)</label>
                            </div>
                            <div class="col-md-6 form-floating mb-3">
                                <input type="text" name="title[en]" class="form-control" placeholder="{{ __('lang.title') }}" id="{{ __('lang.title') }}" >
                                <label for="{{ __('lang.title') }}">{{ __('lang.title') }} (EN)</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="{{ __('lang.upload image') }}">{{ __('lang.upload image') }}</label>
                            <input type="file" name="img" accept="image/*" class="form-control" id="{{ __('lang.upload image') }}">
                        </div>

                        <button type="submit" id="submitEvaluation" class="btn btn-success">{{ __('lang.save') }}</button>
                    </form>

                    <br>

                    <br>
                    <div class="row">
                        <div class="col-12 p-3" style="overflow:auto">
                            <div class="col-12 p-0" >
                                <table class="table table-bordered  table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('lang.Image') }}</th>
                                            <th>{{ __('lang.title') }}</th>
                                            <th>{{ __('lang.control') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($extra_mile as $ex)
                                        <tr>
                                            <td>{{ $ex['id'] }}</td>
                                            <td><img width="100px" src="{{ url('storage/uploads/home_page/'.$ex['img']) }}"> </td>
                                            <td>{{ Session()->get('lang_code')=='en'? $ex['title']->en: $ex['title']->ar }}</td>
                                            <td style="width: 270px;">
                                                <a data-bs-toggle="modal" data-bs-target="#update_extra_mile{{ $ex['id'] }}">
                                                    <span class="btn btn-outline-success btn-sm font-1 mx-1">
                                                        <span class="fas fa-wrench "></span> {{ __('lang.Edit') }}
                                                    </span>
                                                </a>

                                                <a href="{{ route('admin.delete_extra_mile',$ex['id']) }}" class="btn btn-outline-danger btn-sm font-1 mx-1">
                                                    <span class="fas fa-trash "></span> {{ __('lang.Delete') }}
                                                </a>
                                            </td>

                                            <!--Start Modal Edit and Update extra_mile -->
                                            <div class="modal fade" id="update_extra_mile{{ $ex['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{ __('lang.Edit') }} => {{ __('lang.Extra lang.Extra Mile ( Sixth Section )') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('admin.update_extra_mile',$ex['id']) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6 form-floating mb-3">
                                                                    <input type="text" name="title[ar]" class="form-control" placeholder="{{ __('lang.title') }}" id="{{ __('lang.title') }}" value="{{ $ex['title']->ar }}">
                                                                    <label for="{{ __('lang.title') }}">{{ __('lang.title') }} (AR)</label>
                                                                </div>
                                                                <div class="col-md-6 form-floating mb-3">
                                                                    <input type="text" name="title[en]" class="form-control" placeholder="{{ __('lang.title') }}" id="{{ __('lang.title') }}" value="{{ $ex['title']->en }}">
                                                                    <label for="{{ __('lang.title') }}">{{ __('lang.title') }} (EN)</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <img src="{{ url('storage/uploads/home_page/'.$ex['img']) }}" class="img-fluid">
                                                                </div>
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="{{ __('lang.upload image') }}">{{ __('lang.upload image') }}</label>
                                                                <input type="file" name="img" accept="image/*" class="form-control" id="{{ __('lang.upload image') }}">
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('lang.cancel') }}</button>
                                                        <button type="submit" id="submitEvaluation" class="btn btn-success">{{ __('lang.save') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            <!--End Modal Edit and Update extra_mile -->
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- End Extra-Mile --}}


        {{-- Start Powerful-Platform --}}
        <div class="tab-pane fade" id="pills-Powerful-Platform" role="tabpanel" aria-labelledby="pills-Powerful-Platform-tab">
            <div class="row">
                <div class="col-md-12 row shadow main-box pb-3">
                    <div class="col-12 row px-0">
                        <div class="col-md-6 px-3 py-3">
                            <span class="fas fa-info-circle"></span> {{ __('lang.Edit') }} {{ __('lang.Powerful Platform ( Seventh Section )') }}
                        </div>
                        <div class="col-md-6" >

                        </div>
                    </div>

                    <form action="{{ route('admin.update_Powerful_Platform') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 form-floating mb-3">
                                <textarea class="form-control" name="description[ar]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $Powerful_Platform['description']->ar}}</textarea>
                                <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (AR)</label>
                            </div>

                            <div class="col-md-6 form-floating mb-3">
                                <textarea class="form-control" name="description[en]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{ $Powerful_Platform['description']->en}}</textarea>
                                <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (EN)</label>
                            </div>

                            <div class="col-md-4">
                                <img src="{{ url('storage/uploads/home_page/'.$Powerful_Platform['img']) }}" class="img-fluid">
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="{{ __('lang.upload image') }}">{{ __('lang.upload image') }}</label>
                            <input type="file" name="img" accept="image/*" class="form-control" id="{{ __('lang.upload image') }}">
                        </div>

                        <button type="submit" id="submitEvaluation" class="btn btn-success">{{ __('lang.save') }}</button>
                    </form>


                </div>
            </div>
        </div>
        {{-- End Powerful-Platform --}}
    </div>


</div>
<style>
    .nav-pills .nav-link{
        border: 1px solid #fff;
        margin: 0px 10px;
        color: white;
        margin-bottom: 10px;
    }
    .nav-pills .nav-link:hover{
        background-color: #fff;
        color: #11233b;
    }
    .nav-pills .nav-link.active:hover{
        background-color: #0d6efd;
        color: white;
    }
</style>





{{-- Start Modal Bootstrap --}}

  <!--Start Modal Add Srvices -->
  <div class="modal fade" id="AddServices" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">{{ __('lang.Add Services') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('admin.create_service') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="modal-body">



                <div class="form-group row">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="{{ __('lang.upload image') }}">{{ __('lang.upload image') }}</label>
                        <input type="file" name="icon" accept="image/*" class="form-control" id="{{ __('lang.upload image') }}">
                    </div>

                    <div class="col-md-6 form-floating mb-3">
                        <input type="text" name="serv_title[ar]" class="form-control" placeholder="{{ __('lang.serv_name') }}" id="{{ __('lang.serv_name') }}" value="{{-- $header['title']->ar --}}">
                        <label for="{{ __('lang.serv_name') }}">{{ __('lang.serv_name') }} (AR)</label>
                    </div>
                    <div class="col-md-6 form-floating mb-3">
                        <input type="text" name="serv_title[en]" class="form-control" placeholder="{{ __('lang.serv_name') }}" id="{{ __('lang.serv_name') }}" value="{{-- $header['title']->en --}}">
                        <label for="{{ __('lang.serv_name') }}">{{ __('lang.serv_name') }} (EN)</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 form-floating mb-3">
                        <textarea class="form-control" name="serv_desc[ar]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{-- $header['description']->ar --}}</textarea>
                        <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (AR)</label>
                    </div>

                    <div class="col-md-6 form-floating mb-3">
                        <textarea class="form-control" name="serv_desc[en]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px">{{-- $header['description']->en --}}</textarea>
                        <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (EN)</label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('lang.cancel') }}</button>
              <button type="submit" id="submitEvaluation" class="btn btn-success">{{ __('lang.save') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--End Modal Add Srvices -->

<!--Modal Add Works  -->
<div class="modal fade" id="AddWork" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">{{ __('lang.Add Work') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('admin.create_work') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="modal-body">

                <div class="form-group row">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="{{ __('lang.upload image Work') }}">{{ __('lang.upload image Work') }}</label>
                        <input type="file" name="img" accept="image/*" class="form-control" id="{{ __('lang.upload image Work') }}">
                    </div>

                    <div class="col-md-6 form-floating mb-3">
                        <input type="text" name="title[ar]" class="form-control" placeholder="{{ __('lang.Work Name') }}" id="{{ __('lang.Work Name') }}">
                        <label for="{{ __('lang.Work Name') }}">{{ __('lang.Work Name') }} (AR)</label>
                    </div>
                    <div class="col-md-6 form-floating mb-3">
                        <input type="text" name="title[en]" class="form-control" placeholder="{{ __('lang.Work Name') }}" id="{{ __('lang.Work Name') }}" >
                        <label for="{{ __('lang.Work Name') }}">{{ __('lang.Work Name') }} (EN)</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 form-floating mb-3">
                        <textarea class="form-control" name="description[ar]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px"></textarea>
                        <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (AR)</label>
                    </div>

                    <div class="col-md-6 form-floating mb-3">
                        <textarea class="form-control" name="description[en]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px"></textarea>
                        <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (EN)</label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('lang.cancel') }}</button>
              <button type="submit" id="submitEvaluation" class="btn btn-success">{{ __('lang.save') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--End Modal Add Works -->



<!--Start Modal Add_why_use_awen -->
<div class="modal fade" id="Add_why_use_awen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">{{ __('lang.Add new') }} {{ __('lang.Why Use Awen') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('admin.create_why_use_awen') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="modal-body">



                <div class="form-group row">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="{{ __('lang.upload image') }}">{{ __('lang.upload image') }}</label>
                        <input type="file" name="img_icon" accept="image/*" class="form-control" id="{{ __('lang.upload image') }}">
                    </div>

                    <div class="col-md-6 form-floating mb-3">
                        <input type="text" name="serv_title[ar]" class="form-control" placeholder="{{ __('lang.serv_name') }}" id="{{ __('lang.serv_name') }}" >
                        <label for="{{ __('lang.serv_name') }}">{{ __('lang.serv_name') }} (AR)</label>
                    </div>
                    <div class="col-md-6 form-floating mb-3">
                        <input type="text" name="serv_title[en]" class="form-control" placeholder="{{ __('lang.serv_name') }}" id="{{ __('lang.serv_name') }}">
                        <label for="{{ __('lang.serv_name') }}">{{ __('lang.serv_name') }} (EN)</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 form-floating mb-3">
                        <textarea class="form-control" name="serv_desc[ar]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px"></textarea>
                        <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (AR)</label>
                    </div>

                    <div class="col-md-6 form-floating mb-3">
                        <textarea class="form-control" name="serv_desc[en]" placeholder="{{ __('lang.description') }}"  id="{{ __('lang.description') }}" style="height: 100px"></textarea>
                        <label for="{{ __('lang.description') }}">{{ __('lang.description') }} (EN)</label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('lang.cancel') }}</button>
              <button type="submit" id="submitEvaluation" class="btn btn-success">{{ __('lang.save') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--End Modal Add_why_use_awen -->
@endsection
