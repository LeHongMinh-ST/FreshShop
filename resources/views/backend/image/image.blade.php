@foreach($images as $image)
    <img src="{{asset($image->path . $image->name)}}" alt="">
@endforeach
