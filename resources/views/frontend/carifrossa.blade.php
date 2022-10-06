@extends('frontend.index')
@section('judul','Halaman Rossa')

@section('isi')
<div class="container-fluid mt-2 mb-5">
    <div class="products">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="d-flex justify-content-between p-3 bg-white mb-3 align-items-center"> <span class="font-weight-bold text-uppercase">Musik Rossa</span>
                    <div>

                    </div>
                </div>
                <div class="row g-3">
                  @foreach ($frossa as $fr)
                  <div class="col-md-4">
                    <figure class="card card-product-grid card-lg">
                      <a href="#" class="img-wrap" data-abc="true"><img src="/image/{{ $fr->image }}"></a>
                      <figcaption class="info-wrap">
                            <div class="row">

                              <div class="col-md-8">

                                <a href="#" class="title" data-abc="true">{{$fr->judul}}</a>

                              </div>

                              <div class="col-md-4">

                                <div class="rating text-right">
                                  <p>{{$fr->durasi}}</p>
                                </div>
                              </div>
                            </div>
                          </figcaption>
                    <div class="bottom-wrap">

                      <div class="price-wrap">
                        <span class="price h5">{{$fr->pencipta}}</span> <br> <small class="text-success">{{$fr->rilis}}</small>
                      </div>
                    </div>
                  </figure>
                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
