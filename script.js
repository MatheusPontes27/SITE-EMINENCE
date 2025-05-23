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

    const questions = document.querySelectorAll('.faq-question');

  questions.forEach(question => {
    question.addEventListener('click', () => {
      const answer = question.nextElementSibling;
      const toggleIcon = question.querySelector('.faq-toggle');

      // Fecha todas as outras respostas e reseta os ícones
      document.querySelectorAll('.faq-answer').forEach(a => {
        if (a !== answer) a.style.display = 'none';
      });
      document.querySelectorAll('.faq-toggle').forEach(icon => {
        if (icon !== toggleIcon) icon.textContent = '▶';
      });

      // Alternar visibilidade da resposta clicada e ícone
      if (answer.style.display === 'block') {
        answer.style.display = 'none';
        toggleIcon.textContent = '▶';
      } else {
        answer.style.display = 'block';
        toggleIcon.textContent = '▲';
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    emailjs.init("EgG2ZUtkVeMClV63C"); // Sua chave pública

    document.getElementById("contact-form").addEventListener("submit", function (event) {
      event.preventDefault(); // Impede o envio padrão

      emailjs.sendForm("service_zylsu65", "template_pazvv9q", this)
        .then(function (response) {
          alert("Mensagem enviada com sucesso!");
        }, function (error) {
          alert("Erro ao enviar. Tente novamente.");
          console.log(error);
        });
    });
  });

  const toggle = document.querySelector('.menu-toggle');
  const menu = document.querySelector('.menu');

  toggle.addEventListener('click', () => {
    toggle.classList.toggle('active');
    menu.classList.toggle('show');
  });

  function abrirAgendamento() {
  document.getElementById("agendamentoModal").style.display = "flex";
}

function fecharAgendamento() {
  document.getElementById("agendamentoModal").style.display = "none";
}

const horariosTotais = [
  "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00"
];

// Simula horarios ocupados (ideal: buscar do backend ou banco de dados)
const horariosOcupados = {
  "2025-05-20": ["09:00", "14:00"],
  "2025-05-21": ["08:00", "12:00"]
};

function carregarHorariosDisponiveis() {
  const data = document.getElementById("data").value;
  const selectHorario = document.getElementById("horario");
  selectHorario.innerHTML = "";

  if (!data) return;

  const ocupados = horariosOcupados[data] || [];

  horariosTotais.forEach(horario => {
    const option = document.createElement("option");
    option.value = horario;
    option.textContent = ocupados.includes(horario) ? `${horario} - Horário já reservado` : horario;
    option.disabled = ocupados.includes(horario);
    selectHorario.appendChild(option);
  });
}

function enviarParaWhatsApp() {
  const data = document.getElementById('data').value;
  const horario = document.getElementById('horario').value;
  const dentista = document.getElementById('dentista').value;

  if (!data || !horario || !dentista) {
    alert("Preencha todos os campos!");
    return;
  }

  const dataFormatada = new Date(data + 'T00:00:00').toLocaleDateString('pt-BR');
  const mensagem = `Olá! Gostaria de agendar uma consulta:\n\n📅 *Data:* ${dataFormatada}\n🕒 *Horário:* ${horario}\n🦷 *Dentista:* ${dentista}`;
  const mensagemCodificada = encodeURIComponent(mensagem);
  const numero = '5583998220272';
  const link = `https://wa.me/${numero}?text=${mensagemCodificada}`;
  
  window.open(link, '_blank');

  // Enviar email para a clínica via PHP
  enviarEmail(dataFormatada, horario, dentista);
}




    
     