@extends('layouts.main')
@section('content')
<table class="table">
    <tr>
        <th>
            Laporan Perawatan
        </th>
        <th>
            Kategori Sarana
        </th>

        <th>
            Upload Poto
        </th>
        <th>
            diLakukan Oleh
        </th>
        <th>
            Detail
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