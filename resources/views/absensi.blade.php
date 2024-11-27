@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2 class="text-center">Absensi Pegawai</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h4 class="mb-4">Hai, dddd</h4>
                    <p class="text-muted">Tanggal: <strong>{{ now()->format('d-m-Y') }}</strong></p>

                    <!-- Kamera -->
                    <div id="camera" class="mb-3">
                        <video id="video" autoplay class="border rounded w-100"></video>
                    </div>
                    <button id="capture" class="btn btn-primary btn-block">Ambil Foto</button>
                    <canvas id="canvas" style="display:none;"></canvas>
                    <img id="snapshot" src="#" alt="Foto Anda" class="img-thumbnail mt-3" style="display:none;" />

                    <!-- GPS Location -->
                    <div class="form-group mt-4">
                        <label for="location">Lokasi Anda:</label>
                        <input type="text" id="location" class="form-control" readonly>
                    </div>

                    <!-- Button Submit -->
                    <button id="submit-absensi" class="btn btn-success btn-block mt-3">Submit Absensi</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const snapshot = document.getElementById('snapshot');
    const locationInput = document.getElementById('location');

// Akses Kamera
navigator.mediaDevices
        .getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => {
            console.error("Gagal mengakses kamera:", err);
        });

    // Ambil Foto
    document.getElementById('capture').addEventListener('click', () => {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        const dataURL = canvas.toDataURL('image/jpeg');
        snapshot.src = dataURL;
        snapshot.style.display = "block";
    });

    // Ambil Lokasi GPS
    navigator.geolocation.getCurrentPosition(position => {
        const { latitude, longitude } = position.coords;
        locationInput.value = `${latitude}, ${longitude}`;
    });

    // Submit Absensi
    document.getElementById('submit-absensi').addEventListener('click', () => {
        const dataURL = snapshot.src;
        const location = locationInput.value;

        fetch('/absensi/store', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ foto: dataURL, gps_location: location }),
        })
        .then(response => response.json())
        .then(data => alert('Absensi berhasil disimpan'))
        .catch(err => console.error('Error:', err));
    });
</script>
@endsection
