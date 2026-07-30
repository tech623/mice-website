<?php $states = App\Models\Property::getStates();
?>
<div class="banner-form-demo d-none d-lg-block d-xl-block d-xl-none">
    <form action="{{route('search-service')}}" method="GET">
        <div class="search-content">
            <div class="service-input-section">
                <label class="selectService" style="cursor: pointer;">Services <i class="fas fa-angle-down rotate"></i></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><img src="{{asset('images/assignment.svg')}}"></span>
                    </div>
                    <?php
                    if (request()->is("/*") || request()->is("search*") || request()->is("hotels*")) {
                        $className = "dropdown";
                        $readOnly = "";
                        $disabled = "disabled";
                    } else {
                        $className = "dropdown";
                        $readOnly = "readonly";
                        $disabled = "";
                    }

                    ?>
                    <div class="{{$className}} dropdown-service dropdown-mega position-static">
                        <input type="text" class="dropdown-toggle service-toggle inputValueField" name="service" id="service" value="{{$selectedService}}" placeholder="Choose Service" {{$readOnly}} />

                        <div class="dropdown-menu service-dropdown shadow">
                            <div class="mega-service-conttext px-4">
                                <div class="container-fluid" style="margin-top: 20px; margin-bottom: 20px;">
                                    <?php
                                    foreach ($services as $service) { ?>
                                        <div class="row">
                                            <?php
                                            if (count($service) == 5) {
                                                foreach ($service as $value) { ?>
                                                    <div class="col">
                                                        <div class="service-card" onclick="selectService(event,'<?php echo $value['service_name']; ?>')">
                                                            <div class="service-image d-flex justify-content-center">
                                                                <img src="<?php echo $value['img_path']; ?>" alt="" class="img-thumbnails">
                                                            </div>
                                                            <div class="service-text-dropdown d-flex justify-content-center my-3">
                                                                <span><?php echo $value['service_name']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php  }
                                            } else {
                                                $left = 5 - count($service);
                                                foreach ($service as $value) { ?>
                                                    <div class="col">
                                                        <div class="service-card" onclick="selectService(event,'<?php echo $value['service_name']; ?>')">
                                                            <div class="service-image d-flex justify-content-center">
                                                                <img src="<?php echo $value['img_path']; ?>" alt="" class="img-thumbnails">
                                                            </div>
                                                            <div class="service-text-dropdown d-flex justify-content-center my-3">
                                                                <span><?php echo $value['service_name']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php  }
                                                for ($i = 0; $i < $left; $i++) {
                                                    echo "<div class='col'></div>";
                                                }
                                            }


                                            ?>



                                        </div>

                                    <?php    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="location-input-section">
                <label class="selectLocation" style="cursor: pointer;">Location <i class="fas fa-angle-down rotatel"></i></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><img src="{{asset('images/locatore.svg')}}"></span>
                    </div>
                    <div class="dropdown dropdown-location dropdown-mega position-static">


                        <input type="text" class="dropdown-toggle location-toggle inputValueField" id="location" name="location" value="{{request()->get('location')}}" placeholder="Choose Location" readonly="">

                        <div class="dropdown-menu service-location shadow">
                            <div class="mega-content px-4">
                                <div class="container-fluid" style="margin-top: 20px; margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-3" style="padding-top: 10px;">
                                            <div class="list-group" id="list-tab" role="tablist">
                                                @foreach($states as $state)
                                                <a onmouseover="openCity(event, '{{$state->region}}')" class="list-group-item list-group-item-action @if($state->region=='karnataka') {{"active"}} @endif" id="list-{{$state->region}}-list" data-toggle="tab" href="#list-{{$state->region}}" role="tab" aria-controls="{{$state->region}}">
                                                    <div class="d-flex justify-content-around">
                                                        <p>{{ucfirst($state->region)}}</p>
                                                        <i class="fas fa-angle-right"></i>
                                                    </div>
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-9" style="background-color: #F1F2ED; border-radius: 16px; padding-top: 10px; padding-bottom:10px">
                                            <div class="tab-content tab-location" id="nav-tabContent">
                                                @foreach($states as $state)
                                                <div class="tab-pane fade @if($state->region=='karnataka') {{"show active"}} @endif" id="{{$state->region}}" role="tabpanel" aria-labelledby="list-{{$state->region}}-list">
                                                    <div class="row">
                                                        <?php
                                                        $list_items = App\Models\Property::getCityByState($state->region);
                                                        if($state->region == "karnataka"){
                                                            
                                                            array_push($list_items[0], "coorg","mysore","medikeri","sakleshpur","shimoga");
                                                        }
                                                        foreach ($list_items as $items) {
                                                            echo  '<div class="col-3 d-flex justify-content-center"><ul class="list-group">';
                                                            foreach ($items as $value) { ?>
                                                                <li class="list-group-item">
                                                                    <a href="javascript:void(0);" onclick="selectLocation(event, '<?php echo ucfirst($value); ?>')" class="tab-location">
                                                                        <?php echo ucfirst($value); ?>
                                                                    </a>
                                                                </li>
                                                        <?php }
                                                            echo '</ul></div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="date-input-section">
                <label for="reservation" style="cursor: pointer;">Date <i class="fas fa-angle-down" ></i></label>
                <div class="input-group mb-3 reservation-block">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><img src="{{asset('images/calender.svg')}}"></span>
                    </div>
                    <input type="text" class="form-control float-right reservation" name="dates" id="reservation" value="{{request()->get('dates')}}" placeholder="Select Dates">
                </div>
            </div>
            <div class="search-button-section">
                <button class="mice-button-search mice-button-text searchButton" type="submit" {{$disabled}}>Search</button>
            </div>
        </div>
    </form>
</div>