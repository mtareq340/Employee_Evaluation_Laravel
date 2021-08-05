@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>الزيارات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="">الزيارات</a></li>
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

                    <form action="{{ route('dashboard.visits.store', 1) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <input type="text" style="display:none;" name="store_id" class="form-control" value="{{ $store_id }}">

                            <div class="form-group">
                                <label>تاريخ الزيارة</label>
                                <input type="date" name="visit_date" class="form-control" value="">
                            </div>
                           
                            <div class="form-group">
                            <label>ترتيب الزيارة</label>
                            <select name="visitnumber_id" class="form-control">
                                <option value="">الزيارة</option>
                                @foreach ($visitnumbers as $visitnumber)
                                    <option value="{{ $visitnumber->id }}" {{ old('visitnumber_id') == $visitnumber->id ? 'selected' : '' }}>{{ $visitnumber->name }}</option>
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
