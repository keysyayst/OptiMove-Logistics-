const lokasiContainer = document.getElementById("lokasi-container");
lokasiContainer.innerHTML = "<p class='loading'>Mengambil data mitra global...</p>";

async function ambilDataKantor() {
  try {
    const response = await fetch("https://jsonplaceholder.typicode.com/users");
    if (!response.ok) throw new Error("Gagal mengambil data API");

    const data = await response.json();
    lokasiContainer.innerHTML = "";

    data.slice(0, 8).forEach((user, index) => {
      const div = document.createElement("div");
      div.classList.add("lokasi-card");
      div.style.animationDelay = `${index * 0.15}s`;

      div.innerHTML = `
        <div class="lokasi-card-content">
          <h3><i class="fas fa-building"></i> ${user.company.name}</h3>
          <p><strong>Kota:</strong> ${user.address.city}</p>
          <p><strong>Alamat:</strong> ${user.address.street}, ${user.address.suite}</p>
          <p><i class="fas fa-envelope"></i> ${user.email}</p>
          <p><i class="fas fa-phone"></i> ${user.phone}</p>
        </div>
      `;
      lokasiContainer.appendChild(div);
    });
  } catch (error) {
    console.error(error);
    lokasiContainer.innerHTML = "<p class='error'>Gagal memuat data dari API.</p>";
  }
}
ambilDataKantor();

