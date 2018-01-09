<table class="table table-hover">
    <tr>
        <th>Grade</th>
        <th class="text-center">Raw</th>
        <th class="text-center">Certified</th>
        <th class="text-center">Total</th>
    </tr>
    @foreach(config('coins.gradesProof') as $item)
        <tr>
            <th>{{$item}}</th>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
    @endforeach
</table>