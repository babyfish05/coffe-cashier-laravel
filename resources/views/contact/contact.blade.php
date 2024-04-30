@extends('tamplate.layout')
@push('style')
    
@endpush
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* CSS styling untuk tampilan Contact Us */
        /* Style untuk kontainer utama */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        /* Style untuk foto kantor */
        .office-photo {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        /* Style untuk formulir kontak */
        .contact-form {
            margin-top: 20px;
        }
        .contact-form label {
            display: block;
            margin-bottom: 5px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .contact-form textarea {
            height: 150px;
        }
        .contact-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <p>Alamat: Jalan Contoh No. 123, Kota Contoh, Negara Contoh</p>
        <h1>foto kantor</h1>
        <img src="Harvard.jpeg" alt="Foto Kantor" class="office-photo">
        <h1>alamat</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2947.502498150894!2d-71.1208290884339!3d42.37444073407298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e377427d7f0199%3A0x5937c65cee2427f0!2sUniversitas%20Harvard!5e0!3m2!1sid!2sid!4v1713852952264!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        {{-- <div id="map" style="height: 400px; margin-bottom: 20px;"></div> <!-- Google Maps akan ditampilkan di sini --> --}}
        <h2>Formulir Kontak</h2>
        <form class="contact-form">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="subject">Subjek:</label>
            <input type="text" id="subject" name="subject" required>
            <label for="message">Pesan:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Kirim Pesan</button>
        </form>
    </div>

    <!-- Skrip untuk menampilkan peta Google Maps -->
    <script>
        function initMap() {
            var officeLocation = {lat: -6.2088, lng: 106.8456}; // Koordinat kantor developer
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: officeLocation
            });
            var marker = new google.maps.Marker({
                position: officeLocation,
                map: map,
                title: 'Kantor Developer'
            });
        }
    </script>
    <!-- Skrip untuk memuat peta Google Maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
</body>
</html>
  <!-- /.card -->
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
          © 2024 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Naurah Rafifatunnisa</a>
        </div>
      </div>
      <div class="col-xl-6">
        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
          <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Naurah Rafifatunnisa</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
          </li>
          <li class="nav-item">
            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  </section>
@endsection
@push('script')
    <script>
        </script>
@endpush

