function load_data() {
  fetch('backend/node2/load_data2.php') //ip nya sesuaikan
    .then(response => response.json())
    .then(data => {
      document.getElementById('last-waktu').textContent = (data.waktu || '-') + " WIB";
      //
      document.getElementById('data-suhu').textContent = (data.suhu || '-');
      document.getElementById('data-kelembapan').textContent = (data.kelembapan || '-');
      document.getElementById('data-cahaya').textContent = (data.cahaya || '-');
      document.getElementById('data-ktanah').textContent = (data.ktanah || '-');
      // 
      document.getElementById('stat-suhu').textContent = (data.stat_suhu || '-');
      document.getElementById('stat-kelembapan').textContent = (data.stat_kelembapan || '-');
      document.getElementById('stat-cahaya').textContent = (data.stat_cahaya || '-');
      document.getElementById('stat-ktanah').textContent = (data.stat_ktanah || '-');
    })
    .catch(error => console.error('Error loading data:', error));
}

setInterval(load_data, 100);
