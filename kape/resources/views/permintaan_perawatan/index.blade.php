@extends('layouts.main')
@section('content')
<table class="table">
    <tr>
        <th>
            Lokasi
        </th>
        <th>
            Poto
        </th>
        <th>
            user                    
        </th>
        <th>
            Status
        </th>
        <th>
            Tanggal_Perawatan
        </th>
        <th>
            Tanggal_selesai
        </th>
    
    </tr>

    @foreach ($detail_perawatans as $row )
    <tr>
        <td>
            {{$row ['laporan_perawatan']}}
        </td>
        <td>
            {{$row ['kategori_sarana']}}
        </td>

        

    </tr>

        
        
        
        @endforeach
</table>
@endsection