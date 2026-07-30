<div class="col-md-10 offset-md-1">
    @if($properties->count() > 0)
    <div class="row" style="margin-top: -40px;">

        @foreach($properties as $item)
        @if($item->id != request()->propertyid)
        <div class="col-md-4 col-6">
            <div class="service-tab">
                <div class="service-img">
                    <img src="{{$item['img_path']}}" alt="{{$item['property_title']}}" style="width: 100%;">
                </div>
                <div class="service-title">
                    <h4>{{$item['property_title']}}</h4>
                </div>
                <div class="service-text">
                    <p>{{\Illuminate\Support\Str::limit($item['description'], 140)}}</p>
                </div>
                <div class="service-button">
                    <a href="{{route('property-detail', [$item['id'] , \Illuminate\Support\Str::slug($item['property_title'], '-')] )}}" class="mice-button mice-button-text" style="position: absolute; bottom:0px">Know more</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @else
    <div class="col-md-12 text-center text-bold mt-4" style="font-size:1.75rem; font-family:'Playfair Display' !important">
        Coming Soon !!!
    </div>    
    @endif
</div>