<p>asdasd</p>
<br>
<br>
<p>asdasdasdddd</p>
<table>
    <thead>
        <tr>
            <th> Tegangan R </th>
            <th> Tegangan S </th>
            <th> Tegangan T </th>
            <th> Arus R </th>
            <th> Arus s </th>
            <th> Arus T </th>
            <th> Daya R </th>
            <th> Daya S </th>
            <th> Daya T </th>
            <th> Daya Semu R </th>
            <th> Daya Semu S </th>
            <th> Daya Semu T </th>
            <th> Power Factor R </th>
            <th> Power Factor S </th>
            <th> Power Factor T </th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->voltage_r }}</td>
            <td>{{ $row->voltage_s }}</td>
            <td>{{ $row->voltage_t }}</td>
            <td>{{ $row->current_r }}</td>
            <td>{{ $row->current_s }}</td>
            <td>{{ $row->current_t }}</td>
            <td>{{ $row->power_r }}</td>
            <td>{{ $row->power_s }}</td>
            <td>{{ $row->power_t }}</td>
            <td>{{ $row->apparent_power_r }}</td>
            <td>{{ $row->apparent_power_s }}</td>
            <td>{{ $row->apparent_power_t }}</td>
            <td>{{ $row->power_factor_r }}</td>
            <td>{{ $row->power_factor_s }}</td>
            <td>{{ $row->power_factor_t }}</td>
        </tr>
        @endforeach
    </tbody>
</table>