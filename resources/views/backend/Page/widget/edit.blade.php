@extends('backend.layout.layout');
@section('title')
    Quản lý Widget
@endsection
@section('content')
   
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title" style="min-height:60px">
                {{ Breadcrumbs::render('widget-edit') }}              
            </div>       
            <form action="{{ route('private-system.management.widget.update',$widget->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div>
                    <div class="row" style="width:100%;margin-top:20px">  
                            @if ($errors->any())
                                <div class="alert alert-danger" style="margin: 0 -15px 0 15px">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    </div>                         
                </div>            
                <div class="" style="margin: 0">
                    <div class="row">                       
                            <div class="col-lg-9">
                                @include('backend.component.album',['title' => 'Thông tin album widget','data' => old('album',$widget->album),'name' => 'album']);
                                <div>
                                    <div class="ibox-title" style="min-height:60px">                          
                                        Thông tin Widget
                                    </div>  
                                    <div class="ibox-content">
                                        <div class="form-group">                               
                                            <label class="control-label" style="padding: 0 15px;margin-bottom:18px">Mô tả widget (*)</label>
                                            <div class="col-lg-12">
                                                <textarea data-target="desc" id="desc" name="desc" class="form-control ckEdition">
                                                    {!! old('desc',$widget->desc) !!}
                                                </textarea>
                                            </div>         
                                         
                                        </div>
                                    </div>
                                </div>
                                <div style="margin: 20px 0">
                                    <div class="ibox-title" style="min-height:60px">                          
                                       Cấu hình Widget
                                    </div>                        
                                    <div class="ibox-content">
                                        <div class="" style="margin:12px 0">
                                            <label class="control-label"  style="margin-bottom:8px">Chọn phần Model(*)</label>
                                             @foreach (__('model')['model'] as $key => $item)
                                                <div>
                                                    <input  
                                                        type="radio"
                                                        id="{{ $key }}"
                                                        value="{{ $key }}"
                                                        class="radio_change_model"
                                                        {{ old('model',$widget->model) == $key ? 'checked' : '' }}
                                                        name="model">
                                                    <label style="position: relative;top:-2px" for="{{ $key }}">{{ $item['name'] }}</label>
                                                </div>
                                             @endforeach
                                        </div>                  
                                        <div class="" style="margin-top:8px;position: relative;">
                                            <input type="text" style="padding-left: 40px;" class="form-control search_model_keyword">
                                            <span style="position: absolute;top: 12px;left: 12px;font-size: 13px;">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <div 
                                                class="search_model_result hidden" 
                                                style="background-color: #f3f3f3;
                                                height: auto;
                                                width: 100%;">
                                                      
                                            </div>
                                           @php
                                               $model = old('model_id') ?? ($model_id ?? []);
                                         
                                           @endphp
                                            <div class="model_table_search_result" style="margin: 12px 0">
                                                
                                                    @foreach ($model['id'] as $key =>  $item)
                                                        <div 
                                                            class="item_result" 
                                                            id="check-{{ $item }}-{{ $model['canonical'][$key] ?? $model['meta_link'][$key]  }}"
                                                            data-id="{{ $item }}"
                                                            data-canonical="{{ $model['canonical'][$key] ?? $model['meta_link'][$key] }}"
                                                            data-name="{{ $model['name'][$key] }}"
                                                            data-image="{{ $model['image'][$key] }}"
                                                            style="margin:12px 0;display: flex;justify-content:space-between;align-items:center">
                                                            <div style="display: flex;align-items:center">
                                                                <div style="margin-right: 12px" class="thumbnail_image">
                                                                    <img width="50" height="50" src="{{ $model['image'][$key] }}" alt="">
                                                                    <input type="hidden" name="model_id[id][]" value="{{ $item }}"/>
                                                                    <input type="hidden" name="model_id[image][]" value="{{ $model['image'][$key] }}"/>
                                                                    <input type="hidden" name="model_id[name][]" value="{{ $model['name'][$key] }}"/>
                                                                    <input type="hidden" name="model_id[canonical][]" value="{{ $model['canonical'][$key] ?? $model['meta_link'][$key] }}"/>
                                                                </div>
                                                                <div>
                                                                    <h4>{{ $model['name'][$key] }}</h4>
                                                                </div>
                                                            </div>
                                                                <div class="iconic_render">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </div>
                                                
                                                        </div>
                                                    @endforeach
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         

                            
                            <div class="col-lg-3">
                                <div>
                                    <div class="ibox-title" style="min-height:60px">                          
                                        Thiết lập cơ bản
                                    </div>                        
                                    <div class="ibox-content">
                                        <div class="" style="margin-top: 8px">
                                            <label class="control-label"  style="margin-bottom:8px">Tên Widget  (*)</label>
                                            <div class="">
                                                <input type="text" value="{{ old('name',$widget->name) }}" name="name" class="form-control">
                                            </div>
                                           
                                        </div>
                                        <div class="" style="margin-top: 8px">
                                            <label class="control-label"  style="margin-bottom:8px">Keyword  (*)</label>
                                            <div class="">
                                                <input type="text" value="{{ old('keyword',$widget->keyword) }}" name="keyword" class="form-control">
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>

                                <div style="margin: 20px 0">
                                    <div class="ibox-title" style="min-height:60px">                          
                                        Code Widget #
                                    </div>                        
                                    <div class="ibox-content">
                                        <div class="" style="margin-top: 8px">
                                            <label class="control-label" style="margin-bottom:8px">Short Code Widget  (*)</label>
                                            <div class="">
                                                <input type="text" value="{{ old('short_code',$widget->short_code) }}" name="short_code" class="form-control">
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                    </div>
                </div>  
               
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                         <button type="submit" class="btn btn-primary" type="submit">Tạo mới</button>
                     </div>
                    </div>
                </form>
    </div>
@endsection