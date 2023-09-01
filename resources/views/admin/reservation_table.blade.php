<table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100" id="visitors" name="visitors">
    <thead>
    <tr>
        <th class="align-middle">#</th>
        <th class="align-middle">Adı Soyadı</th>
        <th class="align-middle">Tarih</th>
        <th class="align-middle">Saat</th>
        <th class="align-middle">Misafir Sayısı</th>
        <th class="align-middle">Şube</th>
        <th class="align-middle">Tel</th>
        <th class="text-center">Email</th>
    </tr>
    </thead>

    <tbody>
    @if($records->count() == 0)
        <tr>
            <td colspan="9" class="text-center">Kayıt bulunamadı</td>
        </tr>
    @else
        @foreach($records as $key => $record)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$record->name}}</td>
                <td>{{$record->reservation_date}}</td>
                <td>{{$record->reservation_time}}</td>
                <td>{{$record->guest_count}}</td>
                <td>{{$record->branch}}</td>
                <td>{{$record->phone_number}}</td>
                <td>{{$record->email}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
