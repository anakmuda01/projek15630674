@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12 warp-produk">
        <div class="row">
          <div class="col-md-12">
            @if (session('pay'))
                <div class="alert alert-danger">
                    {{ session('pay') }}
                    <a href="/pembayaran" class="btn btn-success" role="button" aria-pressed="true"> Klik disini untuk Menuju Pembayaran</a>
                </div>
            @endif
            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                    <a href="/keranjang" class="btn btn-success" role="button" aria-pressed="true"> Klik disini untuk Menuju Keranjang</a>
                </div>
            @endif
            @if (session('max'))
                <div class="alert alert-danger">
                    {{ session('max') }}
                    <a href="/keranjang" class="btn btn-success" role="button" aria-pressed="true"> Klik disini untuk Menuju Keranjang</a>
                </div>
            @endif
          </div>
          <div class="col-lg-5 col-md-12 col-sm-12 produk-img">
            <img src="{{$produk->gambar_produk}}" alt="{{$produk->nama_produk}}">
          </div>
          <div class="col-lg-7 col-md-12 col-sm-12 produk-detail">
            <div class="card-header">
              <h1>{{$produk->nama_produk}}</h1>
              <span>Kategori :
                @foreach ($produk->tags as $tag)
                  {{$tag->nama_tag}}
                @endforeach
              </span>
            </div>
            <div class="card-group">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Harga</h5>
                  <span>Rp. </span><span id="rupiah" class="card-text">{{$produk->harga_produk}}</span>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Minimum Beli</h5>
                  <p class="card-text">20 pcs</p>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Maximum Beli</h5>
                  <p class="card-text">100 pcs</p>
                </div>
              </div>
            </div>
            <br>
            <form action="/cart/{{$produk->id}}" method="POST">
              {{ csrf_field() }}
              <div class="card-group">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Jumlah Beli</h5>
                      <input id="beli" type="number" name="jumlah_beli" min="20" max="100" value="20" style="width:7em; padding-left:0.5em;">
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Total Harga</h5>
                    <span>Rp. <span id="total-harga" class="card-text">0</span> </span>
                  </div>
                </div>
              </div>
              <br>
              <div class="card">
                <div class="card-body">
                  @if (!Auth::user())
                    <a href="/login1st" class="btn btn-block btn-warning"><i class="fa fa-cart-plus fa-fw"></i> &nbsp; Sebelum Melakukan Order, Silahkan Login Terlebih dahulu</a>
                  @else
                  <button type="submit" name="submit" class="btn btn-block"><i class="fa fa-cart-plus fa-fw"></i> &nbsp; Tambah ke Keranjang</button>
                  @endif
                </div>
              </div>
            </form>
          </div>

          <div class="col-md-12 produk-deskripsi">
            <br>
            <div class="card-header">
              <span>Deskripsi Produk</span>
            </div>
            <div class="card">
              <div class="card-body">
                <p>{{$produk->deskripsi_produk}}</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
