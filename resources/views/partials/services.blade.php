@extends('layouts.app')

@section('content')
<div class="colorlib-services py-5">
  <div class="colorlib-narrow-content">
    <div class="text-center mb-5">
      <span class="heading-meta text-uppercase d-block mb-2">Our Services</span>
      <h2 class="colorlib-heading fw-bold mb-3" style="font-size: 32px;">Layanan Kami</h2>
      <p class="text-muted" style="max-width: 680px; margin: 0 auto;">
        Kami menyediakan berbagai layanan untuk mendukung kebutuhan promosi dan branding bisnis Anda
        dengan hasil yang profesional dan berkelas.
      </p>
    </div>

    <!-- Filter kategori -->
    <div class="filter-group text-center mb-5">
      @foreach ($categories as $label)
        <button class="btn-filter {{ $loop->first ? 'active' : '' }}" data-filter="{{ strtolower($label) }}">
          {{ ucfirst($label) }}
        </button>
      @endforeach
    </div>

    <!-- Grid Services -->
    <div id="services-gallery" class="service-grid">
      @foreach ($services as $service)
        <div class="service-item" data-category="{{ strtolower($service->category ?? 'semua') }}">
          <div class="service-card" onclick="openModal('{{ asset($service->image) }}', '{{ $service->title }}', '{{ $service->description }}')">
            <div class="service-image">
              @if($service->image)
                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}">
              @endif
              <span class="badge-category">{{ ucfirst($service->category ?? 'Umum') }}</span>
            </div>
            <div class="service-content">
              <h5 class="service-title">{{ $service->title }}</h5>
              <p class="service-desc">{{ $service->description }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

@include('partials.get_in_touch')

<!-- Modal Gambar Full -->
<div id="imageModal" class="modal">
  <span class="close" onclick="closeModal()">&times;</span>
  <img class="modal-content" id="modalImage">
  <div id="caption"></div>
</div>

<style>
.colorlib-services { background: #fff; padding-top: 3em; padding-bottom: 4em; }
.colorlib-services .colorlib-narrow-content { max-width: 1150px; margin: 0 auto; padding: 0 40px; }

/* === Filter Button === */
.filter-group { display: flex; justify-content: center; flex-wrap: wrap; gap: 14px; }
.btn-filter {
  background: #f7f7f7; border: 1px solid #e2e2e2; padding: 8px 22px;
  font-size: 14px; font-weight: 500; color: #444; border-radius: 8px;
  transition: all 0.3s ease;
}
.btn-filter.active, .btn-filter:hover {
  background: #FFC300; color: #000; border-color: #FFC300;
  box-shadow: 0 3px 10px rgba(255, 195, 0, 0.3);
}

/* === Services Grid === */
.service-grid { 
  display: flex; 
  flex-wrap: wrap; 
  justify-content: center; 
  gap: 25px; 
}
.service-item { 
  flex: 0 1 calc(33.333% - 25px); 
  display: flex; 
}
.service-card {
  border-radius: 12px; 
  background: #fff; 
  box-shadow: 0 4px 20px rgba(0,0,0,0.08);
  overflow: hidden; 
  cursor: pointer; 
  transition: all 0.3s ease; 
  position: relative;
  width: 100%;
}
.service-card:hover { transform: translateY(-6px); box-shadow: 0 10px 25px rgba(0,0,0,0.12); }

.service-image { 
  position: relative; 
  width: 100%; 
  height: 220px; /* 🔧 ukuran gambar diseragamkan */
  overflow: hidden; 
}
.service-image img { 
  width: 100%; 
  height: 100%; 
  object-fit: cover; /* biar semua sejajar tanpa distorsi */
}
.badge-category {
  position: absolute;
  top: 15px; left: 15px;
  background: #FFC300; color: #000;
  font-size: 13px; font-weight: 600;
  border-radius: 6px; padding: 5px 12px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.service-content { padding: 18px 20px 22px; text-align: center; }
.service-title { font-size: 18px; font-weight: 600; color: #000; margin-bottom: 6px; }
.service-desc { font-size: 14px; color: #666; line-height: 1.6; min-height: 50px; }

/* === Modal === */
.modal {
  display: none; position: fixed; z-index: 1000; padding-top: 60px;
  left: 0; top: 0; width: 100%; height: 100%;
  overflow: auto; background-color: rgba(0,0,0,0.9);
}
.modal-content {
  margin: auto; display: block; width: 90%; max-width: 800px; border-radius: 10px;
}
#caption { margin: 10px auto; text-align: center; color: #ccc; font-size: 16px; }
.close { position: absolute; top: 15px; right: 35px; color: #f1f1f1; font-size: 30px; font-weight: bold; cursor: pointer; }
.close:hover { color: #bbb; }

/* === Responsive === */
@media (max-width: 992px) { .service-item { flex: 0 1 calc(50% - 25px); } }
@media (max-width: 576px) { .service-item { flex: 0 1 100%; } .service-title { font-size: 17px; } .service-desc { font-size: 13px; } }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.btn-filter');
  const items = document.querySelectorAll('.service-item');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filter = btn.dataset.filter.toLowerCase();
      items.forEach(item => {
        const category = item.dataset.category?.toLowerCase() || 'semua';
        item.style.display = (filter === 'semua' || category === filter) ? 'flex' : 'none';
      });
    });
  });
});

function openModal(imageSrc, title, desc) {
  const modal = document.getElementById("imageModal");
  const modalImg = document.getElementById("modalImage");
  const caption = document.getElementById("caption");
  modal.style.display = "block";
  modalImg.src = imageSrc;
  caption.innerHTML = `<strong>${title}</strong><br>${desc}`;
}

function closeModal() {
  document.getElementById("imageModal").style.display = "none";
}
</script>
@endsection
