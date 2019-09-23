<select>
	@foreach ($agent as $agentid)
    	<option value="{{$agentid->agent_id}}">{{ $agentid->agent_id}}</option>
	@endforeach
</select>
dfdf