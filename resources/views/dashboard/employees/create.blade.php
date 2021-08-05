@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>الموظفين</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('dashboard.employees.index') }}">الموظفين</a></li>
                <li class="active">اضف</li>
            </ol>
        </section>
      
     
        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">اضف</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.employees.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" name="name" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label>الكود</label>
                                <input type="text" name="code" class="form-control" value="">
                            </div>
                           
                            <div class="form-group">
                                <label>العنوان</label>
                                <input type="text" name="address" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>رقم الموبيل</label>
                                <input type="text" name="phone" class="form-control" value="">
                            </div>

                            
                        <div class="form-group">
                            <label>الفرع</label>
                            <select name="store_id" class="form-control">
                                <option value="">الفروع</option>
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}" {{ old('store_id') == $store->id ? 'selected' : '' }}>{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>الوظيفة</label>
                            <select name="title_id" class="form-control">
                                <option value="">الوظائف</option>
                                @foreach ($titles as $title)
                                    <option value="{{ $title->id }}" {{ old('title_id') == $title->id ? 'selected' : '' }}>{{ $title->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>اضف</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
