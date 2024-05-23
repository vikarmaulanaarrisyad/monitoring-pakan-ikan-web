@push('scripts_vendor')
    <script src="{{ asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
@endpush

{{--  @push('scripts')
    <script>
        function fetchData() {
            $.ajax({
                url: '{{ route('api.monitoring.data_pakan') }}',
                method: 'GET',
                success: function(response) {
                    updateChart(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        function updateChart(data) {
            var chartCanvas = document.getElementById('pakanChart').getContext('2d');
            var chartData = {
                labels: data.listTanggal,
                datasets: [{
                    label: 'Persentase Pakan',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)', // Warna hijau
                    borderColor: 'rgba(75, 192, 192, 0.8)',
                    data: data.listPersentasePakan
                }]
            };
            var chartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + '%'; // Menambahkan % di sumbu y
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y + '%'; // Menambahkan simbol persen di tooltip
                                }
                                return label;
                            }
                        }
                    }
                }
            };

            // Menghancurkan chart lama jika ada
            if (window.pakanChartInstance) {
                window.pakanChartInstance.destroy();
            }

            // Membuat objek Chart.js baru
            window.pakanChartInstance = new Chart(chartCanvas, {
                type: 'line',
                data: chartData,
                options: chartOptions
            });
        }

        // Panggil fungsi fetchData setiap 2 detik menggunakan setInterval
        setInterval(fetchData, 2000); // Setiap 2000 milidetik (2 detik)
    </script>
@endpush  --}}

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "{{ route('pakanmanual.status') }}", // Pastikan route ini mengembalikan status_pakan
                success: function(response) {
                    console.log(response);
                    if (response.status == 1) {
                        $('#customSwitch1').prop('checked', true);
                        $('#customSwitch1').val(status);
                        $('#statusPakan').text('ON');
                    } else {
                        $('#customSwitch1').prop('checked', false);
                        $('#customSwitch1').val(status);
                        $('#statusPakan').text('OFF');
                    }
                }
            });
        });
    </script>

    <script>
        function fetchData() {
            $.ajax({
                url: '{{ route('api.monitoring.data_pakan') }}',
                method: 'GET',
                success: function(response) {
                    updateChart(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        function updateChart(data) {
            var chartCanvas = document.getElementById('pakanChart').getContext('2d');

            var labels = data.listTanggal;
            var dataPakan = data.listPersentasePakan;

            // Mengelompokkan data berdasarkan persentase pakan
            var habis = [],
                sedang = [],
                cukup = [];
            var habisLabels = [],
                sedangLabels = [],
                cukupLabels = [];

            dataPakan.forEach((value, index) => {
                if (value >= 0 && value < 25) {
                    habis.push(value);
                    habisLabels.push(labels[index]);
                    sedang.push(null); // Mengisi null untuk menjaga jumlah data yang sama
                    cukup.push(null); // Mengisi null untuk menjaga jumlah data yang sama
                } else if (value >= 25 && value < 60) {
                    sedang.push(value);
                    sedangLabels.push(labels[index]);
                    habis.push(null); // Mengisi null untuk menjaga jumlah data yang sama
                    cukup.push(null); // Mengisi null untuk menjaga jumlah data yang sama
                } else if (value >= 60 && value <= 100) {
                    cukup.push(value);
                    cukupLabels.push(labels[index]);
                    habis.push(null); // Mengisi null untuk menjaga jumlah data yang sama
                    sedang.push(null); // Mengisi null untuk menjaga jumlah data yang sama
                }
            });

            var chartData = {
                labels: labels,
                datasets: [{
                    label: 'Pakan Habis',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)', // Merah
                    borderColor: 'rgba(255, 99, 132, 0.8)',
                    data: habis
                }, {
                    label: 'Pakan Sedang',
                    backgroundColor: 'rgba(255, 205, 86, 0.5)', // Kuning
                    borderColor: 'rgba(255, 205, 86, 0.8)',
                    data: sedang
                }, {
                    label: 'Pakan Cukup',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)', // Hijau
                    borderColor: 'rgba(75, 192, 192, 0.8)',
                    data: cukup
                }]
            };

            var chartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + '%'; // Menambahkan % di sumbu y
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y + '%'; // Menambahkan simbol persen di tooltip
                                }
                                return label;
                            }
                        }
                    }
                }
            };

            // Menghancurkan chart lama jika ada
            if (window.pakanChartInstance) {
                window.pakanChartInstance.destroy();
            }

            // Membuat objek Chart.js baru
            window.pakanChartInstance = new Chart(chartCanvas, {
                type: 'bar',
                data: chartData,
                options: chartOptions
            });
        }

        // Panggil fungsi fetchData setiap 2 detik menggunakan setInterval
        setInterval(fetchData, 2000); // Setiap 2000 milidetik (2 detik)
    </script>

    <script>
        function updatePakan(checked) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true,
            })
            swalWithBootstrapButtons.fire({
                title: 'Apakah anda yakin?',
                text: 'Anda akan mengaktifkan pemberian pakan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Iya lanjutkan !',
                cancelButtonText: 'Batalkan',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#statusPakan').text('ON');
                    const value = 1;
                    $.ajax({
                        type: "POST",
                        url: "{{ route('pakanmanual.store') }}",
                        data: {
                            value: value,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status = 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(() => {
                                    //window.location.reload();
                                })
                            }
                        },
                        error: function(xhr, status, error) {
                            // Menampilkan pesan error
                            Swal.fire({
                                icon: 'error',
                                title: 'Opps! Gagal',
                                text: xhr.responseJSON.message,
                                showConfirmButton: true,
                            }).then(() => {
                                // Refresh tabel atau lakukan operasi lain yang diperlukan
                                //table.ajax.reload();
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
