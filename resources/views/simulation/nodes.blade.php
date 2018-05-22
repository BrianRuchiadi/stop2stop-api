    @foreach ($nodes as $node)
    <h1 style="text-align: center;">
        {{ $node->name }}
    </h1>
    @if (count($node->nodes) > 0)
    <table style="margin: 0 auto; width: 100vw;">
        <thead>
            <tr>
                <th width="200" style="text-align: left">Id</th>
                <th width="200" style="text-align: left">Name</th>
                <th width="200" style="text-align: left">Name Ref</th>
                <th width="200" style="text-align: left">Has Interchange</th>
                <th width="80" style="text-align: left">In Service</th>
                <th width="200">Show Interchange</th>

            </tr>
        </thead>
            @foreach ($node->nodes as $nodeDetail)
                <tbody>
                    <tr>
                        <td> {{ $nodeDetail->id }} </td>
                        <td> {{ $nodeDetail->name }} </td>
                        <td> {{ $nodeDetail->name_ref }} </td>
                        <td> {{ $nodeDetail->has_interchange }} </td>
                        <td> {{ $nodeDetail->in_service }} </td>
                        @if (!empty($nodeDetail->showInterchange()))
                        <td>
                            <p>
                                @foreach ($nodeDetail->showInterchange() as $interchange) 
                                    @if ($interchange->node_from_id == $nodeDetail->id)
                                        {{ $interchange->line_to_name }}
                                    @else 
                                        {{ $interchange->line_from_name }}
                                    @endif
                                    
                                @endforeach
                            <p>
                        </td>
                        @else
                            <td style="font-style:italic"> No Interchange Data</td>
                        @endif
                    </tr>
                </tbody>
            @endforeach
    </table>
    @else
    <p style="text-align: center;"> No data found for this line </p>
    @endif    
        
    @endforeach
