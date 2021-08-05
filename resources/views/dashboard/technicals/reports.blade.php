@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1> التقارير <small style="font-size:bold;"></small></h1>

         
        </section>
    
        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">


                    <form action="{{ route('dashboard.technicals.index') }}" method="get">

                        <div class="row">

                    
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                <div class="container box">
        <h3 align="center">تقارير الفنيين</h3><br />

     <form action="{{ route('dashboard.technicals.fetchtechnicals') }}" method="post">
        
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
            <div class="col-md-2">
            <button style="width:70px; font-size:16px;" type="submit" name="filter" id="filter" class="btn btn-info btn-sm">ابحث</button>
            </div>
            <div class="col-md-5">
            <div class="input-group input-daterange">
            <div class="form-group">
            <select style="width:150px; height:40px;" name="store_id" id="store_id" class="form-control">
                <option value="">كل الفروع</option>
                @foreach ($stores as $store)
                    <option id="store_id" value="{{ $store->id }}" {{ $store_id == $store->id ? 'selected' : '' }} {{ old('store_id') == $store->id ? 'selected' : '' }}>{{ $store->name }}</option>
                @endforeach
            </select>
            </div>
         
            </div>
            </div>
           
            <div class="col-md-5">
                <div class="input-group input-daterange">
                <div class="input-group-addon">من</div>  
                <input type="text" name="from_date" id="from_date" readonly class="form-control date1" />
                <div class="input-group-addon">إلي</div>  
                <input type="text"  name="to_date" id="to_date" readonly class="form-control date2" />
                </div>
            </div>
            
            </div>

            </div>
            </div>
            <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th width="10%">الرقم</th>
                <th width="30%">اسم العامل</th>
                <th width="15%">رقم الموبايل</th>
                <th width="22%">عدد الزيارات التي قيم فيها الفني</th>
                <th width="20%">النسبة الكلية في الزيارات</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($technicals as $index=>$technical)

                        <tr>
                            <td style="display:none;">{{ $result = 0 }}</td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $technical->name }}</td>
                            <td>{{ $technical->phone }}</td>
                            <td>{{ $technical->countVisits }}</td>
                            @if($technical->countVisits == 0)
                            
                            @else
                            <td> {{ number_format($technical->sumResults/$technical->countVisits, 1) }}%</td>
                            @endif
                        </tr>
                    
                    @endforeach
            </tbody>
            </table>

            {{ csrf_field() }}
            </div>
            </div>
            </form>

        </div>
        </div>


        <script type="text/javascript">

            $('.date1').datepicker({  
            
            format: 'YYYY-MM-DD',
                

            });  

        </script>  
        <script type="text/javascript">

            $('.date2').datepicker({  
  
            });  
        </script>  
 

                </div><!-- end of box body -->



            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
