@if($comments->count() > 0)
    @foreach($comments as $key => $value)
        <div class="user-panel mt-3 d-flex blog-author">
            <div class="image">
                <img src="https://www.micehospitality.com/images/user.ico" class="img-circle" alt="User Image" style="width:3rem;">
            </div>
            <div class="info" style="padding:0px 0px 0px 10px;">
                <a href="javascript:void(0)" class="d-block" style="font-size:16px">{{$value->dealpostedBy->name ?? ""}}</a>
                <span style="font-size:14px">{{$value->created_at->format('d/m/Y h:i:s') ?? ""}}</span>
            </div>
        </div>
        <div class="col-md-12" style="padding:16px; border-bottom:1px solid #f1f2ed;">
            {!! html_entity_decode($value->comments) !!}
        </div>    
    @endforeach
@else
<div class="text-lg mb-4" style="text-align:center;color:grey;"><br>Currently Deal Comments Not Available <i class="fas fa-exclamation"></i></div>
@endif
