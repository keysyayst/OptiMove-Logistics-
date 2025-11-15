const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navLinks.classList.toggle("active");
});

const animatedItems = document.querySelectorAll(".feature-item");
const observerOptions = {
    root: null,
    threshold: 0.1, 
};

const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add("visible");
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);
animatedItems.forEach(item => {
    observer.observe(item);
});

// Tambahkan kode berikut di script.js

// Fungsi untuk menandai link aktif berdasarkan URL saat ini
function setActiveNavLink() {
    // Dapatkan path URL saat ini
    const currentPath = window.location.pathname;
    
    // Dapatkan semua link navigasi
    const navLinks = document.querySelectorAll('.nav-links a');
    
    // Loop melalui setiap link
    navLinks.forEach(link => {
        // Hapus class active dari semua link
        link.classList.remove('active');
        
        // Jika href link cocok dengan path saat ini, tambahkan class active
        if (link.getAttribute('href') === currentPath.split('/').pop()) {
            link.classList.add('active');
        }
        
        // Khusus untuk homepage
        if (currentPath === '/' && link.getAttribute('href') === 'index.html') {
            link.classList.add('active');
        }
    });
}

// ===== Universal Scroll Animation =====
const fadeElements = document.querySelectorAll('.fade-up');

function checkFadeIn() {
  const triggerBottom = window.innerHeight * 0.85;
  fadeElements.forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < triggerBottom) {
      el.classList.add('visible');
    }
  });
}

window.addEventListener('scroll', checkFadeIn);
window.addEventListener('load', checkFadeIn);


// Panggil fungsi saat halaman dimuat
document.addEventListener('DOMContentLoaded', setActiveNavLink);