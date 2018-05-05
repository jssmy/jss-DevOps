<tr>
    <td width="30">@include('partials.lnk-favorite', ['favorite' => $list->favorite, 'type' => 'product_backlogs',
        'id' => $list->id, 'btnSize' => 'btn-xs' ])</td>
    <td width="30"><span class="label label-default">{{$list->visibility}}</span></td>
    <td>
        <a href="{{route('product_backlogs.show', ['slug' => $list->slug])}}">
        {{$list->title}}</a>
        <div class="info">
            
            <span><strong>Commits: </strong> 69 commits </span> 
            <span><strong>Actividades: </strong> 34 actividades abiertas / 35 cerradas </span>
            <span><strong>Miembros: </strong>34</span>
        </div>
    </td>
    <td><span class="text-middle">{{$list->organization->title}}</span></td>
    <td class="text-right" width="60">

        <a href="{{$list->html_url}}" target="_blank" class="text-middle icon-github"
           data-toggle="tooltip" data-placement="left"
           title="Ir a GitHub">
            
            <i class="fa fa-github aria-hidden="true"></i> 
        </a>

            <a href="{{route('issues.index',0)}}" class="text-middle icon-github"
           data-toggle="tooltip" data-placement="left"
           title="Crear cronograma de actividades">
            
             <i class="fa fa-trello" aria-hidden="true"></i>
        </a>

    </td>
</tr>
