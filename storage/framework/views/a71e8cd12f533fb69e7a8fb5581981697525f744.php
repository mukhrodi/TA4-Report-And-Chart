<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo e(DB::table('produk')->count()); ?></h3>

                        <p>Produk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo e(DB::table('pembeli')->count()); ?></h3>

                        <p>Pembeli</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo e(DB::table('transaksi')->count()); ?></h3>

                        <p>Penjualan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>Rp.<?php echo e(number_format( DB::table('transaksi')->sum('bayar'),0,',','.')); ?></h3>

                        <p>Pendapatan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>

    <center>
        <div class="chart" style="width: 80%">
            <center>
                <form action="" class="d-flex gap-5">
                    <select name="select" class="form-control " style="width: 200px">
                        <option value="day">Perhari</option>
                        <option value="month">Perbulan</option>
                    </select>
                    <button class="btn btn-success ml-5">Change</button>
                </form>
            </center>
            <canvas id="myChart"></canvas>
        </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/helpers.min.js"
        integrity="sha512-JG3S/EICkp8Lx9YhtIpzAVJ55WGnxT3T6bfiXYbjPRUoN9yu+ZM+wVLDsI/L2BWRiKjw/67d+/APw/CDn+Lm0Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script></script>
    <script>
        const ctx = document.getElementById('myChart');
        const data = {
            labels: <?php echo json_encode($label, 15, 512) ?>,
            datasets: [{
                label: 'Dataset',
                data: <?php echo json_encode($data_trx, 15, 512) ?>,
                borderColor: 'rgb(255, 99, 132)',

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Point Style: ' + ctx.chart.data.datasets[0].pointStyle,
                    }
                },

            }
        };
        new Chart(ctx, config);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kigamekun/Downloads/CRUD Data Barang (1)/CRUD Data Barang/resources/views/home_admin.blade.php ENDPATH**/ ?>