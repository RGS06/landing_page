// Basic interactivity for full-landing page
(function () {
  const header = document.querySelector('.header');
  const navToggle = document.querySelector('.nav-toggle');
  const navLinks = document.querySelector('.nav-links');

  // Sticky header style on scroll
  const onScroll = () => {
    if (!header) return;
    if (window.scrollY > 8) header.classList.add('scrolled');
    else header.classList.remove('scrolled');
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // Mobile nav toggle
  if (navToggle && navLinks) {
    navToggle.addEventListener('click', () => {
      navLinks.classList.toggle('open');
    });
    navLinks.addEventListener('click', (e) => {
      const t = e.target;
      if (t && t.tagName === 'A') navLinks.classList.remove('open');
    });
  }

  // Smooth scroll for internal anchors
  document.addEventListener('click', (e) => {
    const a = e.target.closest('a[href^="#"]');
    if (!a) return;
    const id = a.getAttribute('href') || '';
    if (id.length > 1) {
      const el = document.querySelector(id);
      if (el) {
        e.preventDefault();
        el.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }
  });

  // Contact form demo handler
  const form = document.querySelector('#contact-form');
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const btn = form.querySelector('button[type="submit"]');
      const orig = btn ? btn.textContent : '';
      if (btn) { btn.disabled = true; btn.textContent = 'Sending...'; }
      setTimeout(() => {
        alert('Thank you! Your message has been received.');
        if (btn) { btn.disabled = false; btn.textContent = orig || 'Send Message'; }
        form.reset();
      }, 600);
    });
  }

  // 3D tilt for institution cards
  const tiltCards = document.querySelectorAll('.inst-card[data-tilt]');
  tiltCards.forEach((card) => {
    const dampen = 20; // higher = subtler tilt
    const handleMove = (e) => {
      const rect = card.getBoundingClientRect();
      const cx = rect.left + rect.width / 2;
      const cy = rect.top + rect.height / 2;
      const dx = (e.clientX - cx) / rect.width;
      const dy = (e.clientY - cy) / rect.height;
      const rx = (+dy * dampen).toFixed(2);
      const ry = (-dx * dampen).toFixed(2);
      card.style.transform = `rotateX(${rx}deg) rotateY(${ry}deg)`;
    };
    const reset = () => { card.style.transform = 'rotateX(0deg) rotateY(0deg)'; };
    card.addEventListener('mousemove', handleMove);
    card.addEventListener('mouseleave', reset);
    card.addEventListener('blur', reset);
  });

  // Spotlight carousel
  const viewport = document.querySelector('.spotlight-viewport');
  if (viewport) {
    const track = viewport.querySelector('.spotlight-track');
    const slides = Array.from(track.querySelectorAll('.slide'));
    const prev = viewport.querySelector('.spotlight-nav.prev');
    const next = viewport.querySelector('.spotlight-nav.next');
    const dotsWrap = viewport.querySelector('.spotlight-dots');
    let idx = 0;
    let timer;

    // Setup track width via CSS (slides are flex: 0 0 100%)
    const go = (n) => {
      idx = (n + slides.length) % slides.length;
      track.style.transform = `translateX(-${idx * 100}%)`;
      if (dotsWrap) {
        dotsWrap.querySelectorAll('button').forEach((b, i) => b.classList.toggle('active', i === idx));
      }
    };

    // Dots
    if (dotsWrap) {
      slides.forEach((_, i) => {
        const b = document.createElement('button');
        b.setAttribute('type', 'button');
        b.className = i === 0 ? 'active' : '';
        b.addEventListener('click', () => go(i));
        dotsWrap.appendChild(b);
      });
    }

    // Controls
    prev && prev.addEventListener('click', () => go(idx - 1));
    next && next.addEventListener('click', () => go(idx + 1));

    // Auto
    const start = () => { timer = setInterval(() => go(idx + 1), 5000); };
    const stop = () => { if (timer) clearInterval(timer); };
    viewport.addEventListener('mouseenter', stop);
    viewport.addEventListener('mouseleave', start);
    start();
    go(0);
  }
})();
