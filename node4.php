<?php include './includes/header.php'; ?>
<div class="page-wrapper">
  <div class="body-wrapper">
    <div class="container-fluid">
      <!--  Header Start -->
      <header class="topbar sticky-top">
        <?php include './includes/topbar.php'; ?>
      </header>
      <!--  Header End -->
      <div class="bg-white rounded-3xl p-3 shadow-md text-xs mb-3 text-center">
        <span>Last update : </span>
        <span id="last-waktu">-</span>
      </div>
      <!-- BAGIAN SENSOR -->
      <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 mt-3 text-center">
        <div class="bg-white shadow-md rounded-3xl p-5">
          <div class="grid-cols-2">
            <span class="text-center font-extrabold text-4xl sm:text-5xl lg:text-6xl text-blue-500"
              id="data-suhu">-</span>
            <span class="text-center font-extrabold sm:text-sm lg:text-md text-blue-500">°C</span>
          </div>
          <i class="fas fa-temperature-half text-2xl mt-1 mb-2 text-blue-400" id="icon-status-ph"></i>
          <div class="text-center text-xs font-bold text-gray-700">Suhu Udara</div>
        </div>
        <div class="bg-white shadow-md rounded-3xl p-5">
          <div class="grid-cols-2">
            <span class="text-center font-extrabold text-4xl sm:text-5xl lg:text-6xl text-green-600"
              id="data-kelembapan">-</span>
            <span class="text-center font-extrabold sm:text-sm lg:text-md text-green-600">%</span>
          </div>
          <i class="fas fa-droplet text-2xl mt-1 mb-2 text-green-400" id="icon-status-ppm"></i>
          <div class="text-center text-xs font-bold text-gray-700">Kelembapan Udara</div>
        </div>
        <div class="bg-white shadow-md rounded-3xl p-5">
          <div class="grid-cols-2">
            <span class="text-center font-extrabold text-4xl sm:text-5xl lg:text-6xl text-yellow-500"
              id="data-cahaya">-</span>
            <span class="text-center font-extrabold sm:text-sm lg:text-md text-yellow-500">Lux</span>
          </div>
          <i class="fas fa-sun text-2xl mt-1 mb-2 text-yellow-400" id="icon-status-ph"></i>
          <div class="text-center text-xs font-bold text-gray-700">Cahaya</div>
        </div>
        <div class="bg-white shadow-md rounded-3xl p-5">
          <div class="grid-cols-2">
            <span class="text-center font-extrabold text-4xl sm:text-5xl lg:text-6xl text-purple-600"
              id="data-ktanah">-</span>
            <span class="text-center font-extrabold sm:text-sm lg:text-md text-purple-600">%</span>
          </div>
          <i class="fas fa-water text-2xl mt-1 mb-2 text-purple-400" id="icon-status-ppm"></i>
          <div class="text-center text-xs font-bold text-gray-700">Kelembapan Tanah</div>
        </div>
      </div>
      <!--  -->

      <!-- BAGIAN STATUS -->
      <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-3 mt-3 mb-3 text-center">
        <div class="flex items-center justify-center py-2 shadow-md text-gray-600 bg-white rounded-full">
          <i class="fas fa-temperature-half text-blue-400 text-2xl mr-2" id="header-icon"></i>
          <span class="text-sm sm:text-base lg:text-base" id="stat-suhu">-</span>
        </div>
        <div class="flex items-center justify-center py-2 shadow-md text-gray-600 bg-white rounded-full">
          <i class="fas fa-droplet text-green-400 text-2xl mr-2" id="header-icon"></i>
          <span class="text-sm sm:text-base lg:text-base" id="stat-kelembapan">-</span>
        </div>
        <div class="flex items-center justify-center py-2 shadow-md text-gray-600 bg-white rounded-full">
          <i class="fas fa-sun text-yellow-400 text-2xl mr-2" id="header-icon"></i>
          <span class="text-sm sm:text-base lg:text-base" id="stat-cahaya">-</span>
        </div>
        <div class="flex items-center justify-center py-2 shadow-md text-gray-600 bg-white rounded-full">
          <i class="fas fa-water text-purple-400 text-2xl mr-2" id="header-icon"></i>
          <span class="text-sm sm:text-base lg:text-base" id="stat-ktanah">-</span>
        </div>
      </div>
      <!--  -->

      <!-- BAGIAN SWITCH -->
      <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 mt-3 mb-3 text-center">
        <div class="bg-white rounded-3xl shadow-md p-5 w-full">
          <div class="switch-container">
            <input type="checkbox" class="checkbox" id="checkbox1" onchange="sendData(1, this.checked ? 1 : 0)">
            <label class="switch" for="checkbox1">
              <span class="slider"></span>
            </label>
          </div>
          <div class="grid items-center font-bold text-gray-700">Fan 1</div>
        </div>
        <div class="bg-white rounded-3xl shadow-md p-5 w-full">
          <div class="switch-container">
            <input type="checkbox" class="checkbox" id="checkbox2" onchange="sendData(2, this.checked ? 1 : 0)">
            <label class="switch" for="checkbox2">
              <span class="slider"></span>
            </label>
          </div>
          <div class="grid items-center font-bold text-gray-700">Fan 2</div>
        </div>
        <div class="bg-white rounded-3xl shadow-md p-5 w-full">
          <div class="switch-container">
            <input type="checkbox" class="checkbox" id="checkbox3" onchange="sendData(3, this.checked ? 1 : 0)">
            <label class="switch" for="checkbox3">
              <span class="slider"></span>
            </label>
          </div>
          <div class="grid items-center font-bold text-gray-700">Mist Maker</div>
        </div>
        <div class="bg-white rounded-3xl shadow-md p-5 w-full sm:col-span-2 lg:col-span-1">
          <div class="switch-container">
            <input type="checkbox" class="checkbox" id="checkbox4" onchange="sendData(4, this.checked ? 1 : 0)">
            <label class="switch" for="checkbox4">
              <span class="slider"></span>
            </label>
          </div>
          <div class="grid items-center font-bold text-gray-700">Grow LED</div>
        </div>
      </div>

      <!-- BAGIAN GRAFIK -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mt-3" id="konten-grafik">
        <div class="bg-white shadow-md rounded-3xl p-4">
          <canvas id="chart-1" class="w-full h-full" style="height: 40vh;"></canvas>
        </div>
        <div class="bg-white shadow-md rounded-3xl p-4">
          <canvas id="chart-2" class="w-full h-full" style="height: 40vh;"></canvas>
        </div>
        <div class="bg-white shadow-md rounded-3xl p-4">
          <canvas id="chart-3" class="w-full h-full" style="height: 40vh;"></canvas>
        </div>
        <div class="bg-white shadow-md rounded-3xl p-4">
          <canvas id="chart-4" class="w-full h-full" style="height: 40vh;"></canvas>
        </div>
      </div>
      <!--  -->
    </div>
  </div>
  <?php include './includes/theme.php'; ?>
</div>
<script>
  function sendData(switchId, value) {
    fetch('backend/node4/update_switch4.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          id: switchId,
          status: value
        })
      })
      .then(response => response.text())
      .then(data => console.log('Success:', data))
      .catch(error => console.error('Error:', error));
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Coba path yang benar
    fetch('backend/node4/load_switch4.php')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.text(); // Mengambil respon sebagai teks untuk debugging
      })
      .then(text => {
        console.log("Response Text:", text); // Log respons untuk memeriksa formatnya
        try {
          const data = JSON.parse(text); // Parsing JSON
          // Atur posisi switch sesuai data
          document.getElementById('checkbox1').checked = data.switch1 == 1;
          document.getElementById('checkbox2').checked = data.switch2 == 1;
          document.getElementById('checkbox3').checked = data.switch3 == 1;
          document.getElementById('checkbox4').checked = data.switch4 == 1;
        } catch (e) {
          console.error("Error parsing JSON:", e);
        }
      })
      .catch(error => console.error('Fetch error:', error));
  });
</script>
<!--  -->
<script src="./backend/node4/data4.js"></script>
<script src="./backend/node4/grafik4.js"></script>

<?php include './includes/footer.php'; ?>