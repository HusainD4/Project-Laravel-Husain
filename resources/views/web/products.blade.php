<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="container my-5">

    <h3 class="text-center my-4">{{ $title }}</h3>


    <x-alert />


    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
      @foreach ($products as $product)
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['title'] }}">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ $product['title'] }}</h5>
              <p class="card-text">{{ $product['description'] }}</p>
              <p class="card-text"><strong>{{ $product['price'] }}</strong></p>
              <div class="mt-auto">
                <a href="#" class="btn btn-primary w-100">Beli Sekarang</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</x-layout>
