@extends('master')


@section('content')

<div class="nav-side-menu">
	<div class="brand">Các loại bệnh</div>
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

	<div class="menu-list">
		<ul id="menu-content" class="menu-content collapse out">
			@foreach($categories as $category)
			<li data-toggle="collapse" data-target="#diseases{{$category['id']}}" class="collapsed">
				<a href="#">{{ $category['name'] }} <span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="diseases{{$category['id']}}">
				@foreach($diseases[$category['id']] as $d)
				<li><a href="disease?id={{$d['id']}}">{{ $d['title'] }}</a></li>

				@endforeach
			</ul>
			@endforeach

		</ul>
	</div>
</div>

<div class="disease-info">
	{!! $disease['content'] !!}
</div>
@endsection