// Typing Effect
const textToType = "Kevin Maximiliano Llanos";
const typingElement = document.querySelector('.typing');
let index = 0;

function typeEffect() {
  if (index < textToType.length) {
    typingElement.textContent += textToType.charAt(index);
    index++;
    setTimeout(typeEffect, 100);
  }
}
typeEffect();

// Scroll Suave para enlaces internos
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth'
      });
    }
  });
});

// Intersection Observer para resaltar el menú activo
const sections = document.querySelectorAll('section');
const navLi = document.querySelectorAll('.nav-menu li a');

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if(entry.isIntersecting){
      navLi.forEach(link => {
        link.classList.remove('active-link');
        if (link.getAttribute('href').replace('#','') === entry.target.id) {
          link.classList.add('active-link');
        }
      });
    }
  });
}, {threshold: 0.5});

sections.forEach(section => {
  if(section.id) {
    observer.observe(section);
  }
});

// Back to Top button
const backToTopButton = document.querySelector('.back-to-top');
window.addEventListener('scroll', () => {
  if(window.scrollY > 300) {
    backToTopButton.style.opacity = '1';
  } else {
    backToTopButton.style.opacity = '0';
  }
});

// Modo Oscuro/Claro
const themeToggle = document.querySelector('.theme-toggle');
themeToggle.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
});

// Barra de Progreso de Scroll
const progressBar = document.querySelector('.scroll-progress-bar');
window.addEventListener('scroll', () => {
  const scrollTop = window.pageYOffset;
  const docHeight = document.documentElement.scrollHeight - window.innerHeight;
  const scrollPercent = (scrollTop / docHeight) * 100;
  progressBar.style.width = scrollPercent + '%';
});

// Efecto Parallax en el Hero
const heroSection = document.querySelector('.hero');
window.addEventListener('scroll', () => {
  let offset = window.pageYOffset;
  heroSection.style.backgroundPositionY = offset * 0.4 + "px";
});
