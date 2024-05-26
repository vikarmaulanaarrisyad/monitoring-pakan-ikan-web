<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cat"></i> Pemberian Pakan</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <strong>Beri Pakan Manual</strong>
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
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cat"></i>Monitoring Camera</h3>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    {{--  <video id="video" autoplay></video>  --}}
                    <img id="video" src="http://{{ $setting->ip_address_esp32cam }}/stream" alt="ESP32-CAM Stream">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
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
</div>
@include('dashboard.scripts')

