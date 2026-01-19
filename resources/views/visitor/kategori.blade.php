@extends('visitor.layout.tamplate')

@section('content')
    <div class="visit-country">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>Kategori Destinasi Wisata Kota Sorong</h2>
                        <p>Informasi lengkap mengenai kategori destinasi wisata di Kota Sorong, dikelompokkan berdasarkan jenis wisata dengan potensi daerah.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="categories-grid">
                        <div class="row">
                            @forelse ($data as $kategori)
                                <div class="col-lg-4 col-md-6 col-sm-12 p-3">
                                    <div class="category-card">
                                        <div class="card-content">
                                            <h4 class="category-name">{{ $kategori->nama_ktg }}</h4>
                                            <p class="wisata-count"><i class="fa fa-map-marker"></i> {{ $kategori->wisata->count() }} Destinasi Wisata</p>
                                            <div class="text-button">
                                                <a href="{{ route('kategori.detail', $kategori->id) }}">Lihat Detail <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <p>Tidak ada kategori wisata tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
<style>
    .categories-grid .row {
        margin-bottom: 20px;
    }
    .category-card {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .card-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .category-name {
        font-size: 20px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }
    .wisata-count {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
    }
    .wisata-count i {
        margin-right: 5px;
    }
  
    .text-button a {
      
        text-decoration: none;
        font-weight: bold;
        padding: 8px 16px;
     
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .text-button a:hover {
        
        color: #333;
    }
</style>
@endsection
