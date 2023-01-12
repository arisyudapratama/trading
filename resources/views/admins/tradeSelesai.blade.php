@extends('admins.trade')
@section('content-transaksi')
@section('count-aktif', $users->trade->where('status', 'running')->count())
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal&nbspBeli</th>
            <th>Kode&nbspSaham</th>
            <th>LOT</th>
            <th>Harga&nbspBeli</th>
            <th>Nominal&nbspBeli</th>
            <th>Tanggal&nbspJual</th>
            <th>Harga&nbspJual</th>
            <th>Nominal&nbspJual</th>
            <th>Durasi&nbspHold</th>
            <th>Gain/Loss</th>
            <th>Gain/Loss</th>
            <th>Fee&nbspBeli</th>
            <th>Fee&nbspJual</th>
            <th>Net&nbspBeli</th>
            <th>Net&nbspJual</th>
            <th>Net&nbspProfit</th>
            <th>Fee</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <!-- {{ $i = 1 }} -->
        @foreach($trades as $trade)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $trade->tanggal_beli }}</td>
            <td>{{ $trade->kode_saham }}</td>
            <td>{{ $trade->lot }}</td>
            <td>{{ 'Rp.'.number_format($trade->harga_beli, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($trade->nominal_beli, 0, ',', '.') }}</td>
            <td>{{ $trade->tanggal_jual }}</td>
            <td>{{ 'Rp.'.number_format($trade->harga_jual, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($trade->nominal_jual, 0, ',', '.') }}</td>
            <td>{{ $trade->jangka_waktu.' hari' }}</td>

            @if($trade->gain_loss_persen > 0)
            <td class="bg-gradient-success text-white">{{ $trade->gain_loss_persen.'%' }}</td>
            @elseif($trade->gain_loss_persen == 0)
            <td class="bg-gradient-warning text-white">{{ $trade->gain_loss_persen.'%' }}</td>
            @else
            <td class="bg-gradient-danger text-white">{{ $trade->gain_loss_persen.'%' }}</td>
            @endif

            <td>{{ 'Rp.'.number_format($trade->gain_loss_nominal, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($trade->fee_beli, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($trade->fee_jual, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($trade->net_beli, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($trade->net_jual, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($trade->net_profit, 0, ',', '.') }}</td>
            <td>{{ 'Rp.'.number_format($trade->fee, 0, ',', '.') }}</td>
            <td class="text-success">{{ $trade->status }}</td>
        </tr>
        @endforeach
    </tbody>
    <!-- <tfoot>
        <tr>
            <th>#</th>
            <th>Tanggal&nbspBeli</th>
            <th>Kode&nbspSaham</th>
            <th>LOT</th>
            <th>Harga&nbspBeli</th>
            <th>Nominal&nbspBeli</th>
            <th>Tanggal&nbspJual</th>
            <th>Harga&nbspJual</th>
            <th>Nominal&nbspJual</th>
            <th>Durasi&nbspHold</th>
            <th>Gain/Loss</th>
            <th>Gain/Loss</th>
            <th>Fee&nbspBeli</th>
            <th>Fee&nbspJual</th>
            <th>Net&nbspBeli</th>
            <th>Net&nbspJual</th>
            <th>Net&nbspProfit</th>
            <th>Fee</th>
            <th>Status</th>
        </tr>
    </tfoot> -->
</table>
@endsection

@section('js-trans')
<script>
    $(document).ready(function () {
        $("li:nth-child(2) > .nav-link").addClass("active");
    });
</script>
@endsection