
	
if(count($agents)>0)
	   @foreach($agents->all() as $agent)
	   <h1>{{$article->title}}<br><small>posted by...{{$article->user->name}}</small></h1>
	   <p>{{$article->body}}</p>

	   @endforeach
	@endif