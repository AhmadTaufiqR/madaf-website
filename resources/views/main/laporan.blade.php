<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Report/</span> Laporan</h4>
        <!-- Bootstrap Toasts with Placement -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                        <label class="form-label" for="selectTypeOpt">Report</label>
                        <select id="selectTypeOpt" class="form-select color-dropdown">
                            <option value="default">Silahkan Pilih Report</option>
                            <option value="minggu">Seminggu</option>
                            <option value="triwulan">Triwulan</option>
                            <option value="tahun">Tahun</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button class="btn btn-primary d-block">Download</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contextual Classes -->
        <div class="card">
            <h5 class="card-header">Laporan</h5>
            <div class=" text-nowrap" style="overflow-x: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>tanggal</th>
                            <th>Saldo</th>
                            <th>Product</th>
                            <th>Total Product</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($laporan as $laporans)
                            @if ($no++ % 2 == 0)
                                <tr class="table-active">
                                    <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                        <strong>{{ $no }}</strong>
                                    </td>
                                    <td>{{ $laporans->date }}</td>
                                    <td><span class="badge bg-label-success me-1">{{ $laporans->amount }}</span></td>
                                    <td>{{ $laporans->populer_product }}</td>
                                    <td>{{ $laporans->total_product }}</td>
                                </tr>
                            @else
                                <tr class="table-default">
                                    <td><i class="fab fa-sketch fa-lg text-warning me-3"></i>
                                        <strong>{{ $no }}</strong>
                                    </td>
                                    <td>{{ $laporans->date }}</td>
                                    <td><span class="badge bg-label-primary me-1">{{ $laporans->amount }}</span></td>
                                    <td>{{ $laporans->populer_product }}</td>
                                    <td>{{ $laporans->total_product }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{ $laporan->links('vendor.pagination.custom') }}
    </div>
</div>



<script>

    document.getElementById('selectTypeOpt').addEventListener('change', function(){
        var value = this.value;
        let date_begin = "{{$date_format_begin}}";
        let end_date = "{{$date_format_end}}";

        let startDate = new Date(date_begin);
        let endDate = new Date(end_date);

        let yearDifference = endDate.getFullYear() - startDate.getFullYear();
        let weekDifference = Math.floor((endDate - startDate) / (7 * 24 * 60 * 60 * 1000));

        if (value === 'default') {

            console.log('tidak dipilih');
            
        } else if (value === 'minggu'){

            for (let i = 0; i < yearDifference; i++) {
                for (let j = 0; j < weekDifference; j++) {
                    let startOfWeek = new Date(startDate.getFullYear() + i, 0, (j * 7) + 1);
                    let endOfWeek = new Date(startDate.getFullYear() + i, 0, (j * 7) + 7);

                    console.log( startOfWeek + " sampai " + endOfWeek);
                }
            }
            
        } else if (value === 'triwulan') {

            for (let i = 0; i < yearDifference; i++) {
                for (let j = 0; j < 4; j++) {
                    let startOfQuarter = new Date(startDate.getFullYear() + i, j * 3, 1);
                    let endOfQuarter = new Date(startDate.getFullYear() + i, (j + 1) * 3 - 1, 31);

                    console.log( startOfQuarter + " sampai " + endOfQuarter);
                }
            }

        } else if (value === 'tahun') {

            for (let i = 0; i < yearDifference; i++) {
                let startOfYear = new Date(startDate.getFullYear() + i, 0, 1);
                let endOfYear = new Date(startDate.getFullYear() + i + 1, 0, 0);
                
                console.log( startOfYear + " sampai " + endOfYear);
            }

        }
    })
</script>
