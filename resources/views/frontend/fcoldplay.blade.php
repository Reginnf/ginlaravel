@extends('frontend.index')
@section('judul','Halaman Coldplay')

@section('isi')
<div class="container-fluid mt-2 mb-5">
    <div class="products">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="d-flex justify-content-between p-3 bg-white mb-3 align-items-center"> <span class="font-weight-bold text-uppercase">Lagu Coldplay</span>
                    <div>
                      <form class="" action="/carifcoldplay" method="GET">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend col-3">
                            <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                            <input type="text" name="keyword" type="search" class="form-control  col-4" placeholder="Cari Musik"
                             aria-label="" aria-describedby="basic-addon1">
                            </div>
                          </form>
                    </div>
                </div>
                <div class="row g-3">

                  <div class="container">

                 <div class="row">
                     @foreach ($fcoldplay as $fc)
                <div class="col-md-4">
                  <figure class="card card-product-grid card-lg">
                    <a href="#" class="img-wrap" data-abc="true"><img src="/image/{{ $fc->image }}"></a>
                    <figcaption class="info-wrap">
                          <div class="row">

                            <div class="col-md-8">

                              <a href="#" class="title" data-abc="true">{{$fc->judul}}</a>

                            </div>

                            <div class="col-md-4">

                              <div class="rating text-right">
                                <p>{{$fc->durasi}}</p>
                              </div>
                            </div>
                          </div>
                        </figcaption>
                  <div class="bottom-wrap">

                    <div class="price-wrap">
                      <span class="price h5">{{$fc->pencipta}}</span> <br> <small class="text-success">{{$fc->rilis}}</small>
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
    </div>
    <div style="">
      {{$fcoldplay->links()}}
    </div>
</div>
@endsection
