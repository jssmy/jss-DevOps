<table class="table table-repository">
    <tbody>
        @foreach ($list as $value)
        <tr>

            @if(in_array('checkbox', $columns))
            <td class="checkbox-switch">
                <div class="material-switch">
                    <input type="checkbox" name="repos[]" value="{{$value->id}}" id="{{$value->id}}" />
                    <label for="{{$value->id}}" class="label-info"></label>
                </div>
            </td>
            @endif

            @if(in_array('board', $columns))
            <td class="information">
                <p>
                <a href="{{$value->shortUrl}}" target="_blank">
                <strong>{{$value->name}}</strong></a></p>
                <small>{{str_limit($value->desc, 120)}}</small>
            </td>
            @endif



        </tr>
        @endforeach
    </tbody>
</table>
