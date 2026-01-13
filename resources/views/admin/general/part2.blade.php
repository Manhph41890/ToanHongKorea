<div class="row">
    <!-- Biểu đồ cột: Sản phẩm theo chuyên mục -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow-sm border-0 mb-4 rounded-xl">
            <div class="card-header bg-white py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">
                    <i class="fas fa-box-open mr-2 text-primary"></i>Thống kê kho hàng theo Chuyên mục
                </h6>
            </div>
            <div class="card-body">
                <div class="chart-area" style="position: relative; height: 350px;">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ tròn: Cơ cấu nhà mạng (Gói cước) -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow-sm border-0 mb-4 rounded-xl">
            <div class="card-header bg-white py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">
                    <i class="fas fa-sim-card mr-2 text-success"></i>Tỷ lệ Gói cước Nhà mạng
                </h6>
            </div>
            <div class="card-body">
                <div class="chart-pie" style="position: relative; height: 350px;">
                    <canvas id="carrierChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.general.part2-lib')
