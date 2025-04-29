const slides = document.querySelectorAll('.intro-images .slide');
    let index = 0;

    setInterval(() => {
      slides[index].classList.remove('active');
      index = (index + 1) % slides.length;
      slides[index].classList.add('active');
    }, 3000);

    document.addEventListener("DOMContentLoaded", () => {
      const slides = document.querySelectorAll(".carousel-slide");
      const prevBtn = document.querySelector(".carousel-prev");
      const nextBtn = document.querySelector(".carousel-next");
      let currentSlide = 0;
      const totalSlides = slides.length;
      const intervalTime = 5000; // Intervalo do autoplay (5 segundos)
    
      // Função para mostrar o slide atual
      function showSlide(index) {
        slides.forEach((slide, i) => {
          slide.classList.toggle("active", i === index);
        });
      }
    
      // Botão de navegação anterior
      prevBtn.addEventListener("click", () => {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
      });
    
      // Botão de navegação próxima
      nextBtn.addEventListener("click", () => {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
      });
    
      // Exibir o slide inicial
      showSlide(currentSlide);
    });
    
     