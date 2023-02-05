@extends('layouts.template')
@section('title')
Dashboard
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>0</h3>
          <p>Total Transaksi</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<!-- ChartJS -->
<script src="{{asset('adminlte')}}/plugins/chart.js/Chart.min.js"></script>
</script>
@endsection