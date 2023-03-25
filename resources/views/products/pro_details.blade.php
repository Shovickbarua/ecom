@extends('layouts.master')
@section('title','Online Shop')
@section('content')

     <!-- Shop Detail Start -->
     <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="" class="" data-ride="">
                    <div class="">
                        <div class="">
                            <img class="w-100 h-100" src="{{asset('/images/'.$product->image)}}" alt="Image">
                        </div>
                       
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{$product->pro_name}}</h3>
                   
                    <h3 class="font-weight-semi-bold mb-4">{{$product->price}}.00 BDT</h3>
                    <p class="mb-4">
                        @if($product->status ==1)
                                <span class="badge light ">
                                    <i class="fa fa-circle text-success me-1"></i>
                                    In Stock
                                </span>
                                @else
                                <span class="badge light ">
                                    <i class="fa fa-circle text-danger me-1"></i>
                                   Out Of Stock
                                </span>
                         @endif
                            </p>
                    <div class="d-flex mb-3">
                        
                    </div>
                    
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <button class="btn btn-primary px-3 buy"><i class="fa fa-shopping-cart mr-1"></i> Buy Now</button>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="popup">               
            <span>Share Modal</span>
            <div class="close"><i class="uil uil-times"></i></div>
            <div class="content">
            <p>Call Now</p>
                <div class="field">
                    <i class="fas fa-phone-alt"></i>
                    <input type="text" readonly value="41564554">
                    <button>Copy</button>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>{{$product->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <!-- Shop Detail End -->

    <script>
    const viewBtn = document.querySelector(".buy"),
    popup = document.querySelector(".popup"),
    close = popup.querySelector(".close"),
    field = popup.querySelector(".field"),
    input = field.querySelector("input"),
    copy = field.querySelector("button");

    viewBtn.onclick = ()=>{
      popup.classList.toggle("show");
    }
    close.onclick = ()=>{
      viewBtn.click();
    }

    copy.onclick = ()=>{
      input.select(); //select input value
      if(document.execCommand("copy")){ //if the selected text copy
        field.classList.add("active");
        copy.innerText = "Copied";
        setTimeout(()=>{
          window.getSelection().removeAllRanges(); //remove selection from document
          field.classList.remove("active");
          copy.innerText = "Copy";
        }, 3000);
      }
    }
  </script>



@endsection

