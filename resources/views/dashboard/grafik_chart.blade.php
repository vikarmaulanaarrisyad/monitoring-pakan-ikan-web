<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header ui-sortable-handle " style="cursor: move;">
                <h3 class="card-title">
                    Grafik Monitoring Pakan Kucing
                </h3>
            </div>
            <div class="card-body">
                <canvas id="pakanChart" style="height: 400px; width: 400px;"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-fish"></i> Pemberian Pakan</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <strong>Beri Pakan</strong>
                    </div>
                    <div class="col-lg-6">
                        <div class="custom-control custom-switch">
                            <input class="custom-control-input" type="checkbox" id="customSwitch1"
                                onchange="updatePakan(this.checked)" value="0">
                            <label for="customSwitch1" class="custom-control-label"><span
                                    id="statusPakan">OFF</span></label>
                        </div>
                    </div>
                </div>

                <hr>
                <strong>Terakhir Kali Pemberian Pakan : </strong>
                <p class="text-muted">
                    Kamis, 23 Mei 2024,
                    13:09:44
                </p>
                <hr>
            </div>
        </div>
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-fish"></i> Ikan</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <strong>Jenis Ikan : </strong>
                        <p class="text-muted">
                            Ikan Hias
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('dashboard.scripts')
