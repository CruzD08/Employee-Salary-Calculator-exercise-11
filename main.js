// ============================================================
//  main.js — Cruz De Los Santos Portfolio
// ============================================================

// --- Mobile Nav Toggle ---
(function () {
  const toggle = document.getElementById('navToggle');
  const menu   = document.getElementById('navMenu');
  if (!toggle || !menu) return;

  toggle.addEventListener('click', () => {
    const isOpen = menu.classList.toggle('open');
    toggle.textContent = isOpen ? '✕' : '☰';
    toggle.setAttribute('aria-expanded', isOpen);
  });

  // Close menu when a link is clicked
  menu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      menu.classList.remove('open');
      toggle.textContent = '☰';
    });
  });
})();

// --- Scroll-triggered fade-in ---
(function () {
  const targets = document.querySelectorAll(
    '.box, .flowchart-card, .proposal-block, .page-intro'
  );
  if (!targets.length || !('IntersectionObserver' in window)) return;

  const obs = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-up', 'visible');
          obs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.08 }
  );

  targets.forEach(el => obs.observe(el));
})();

// --- Navbar scroll shadow ---
(function () {
  const nav = document.querySelector('.navbar');
  if (!nav) return;
  window.addEventListener('scroll', () => {
    nav.style.boxShadow = window.scrollY > 10
      ? '0 4px 30px rgba(13,31,60,0.45)'
      : '0 2px 24px rgba(13,31,60,0.35)';
  });
})();

// --- MPG Calculator ---
(function () {
  const btn    = document.getElementById('calcBtn');
  const result = document.getElementById('calcResult');
  const error  = document.getElementById('calcError');
  const output = document.getElementById('mpgOutput');
  if (!btn) return;

  btn.addEventListener('click', function () {
    const miles   = parseFloat(document.getElementById('milesTraveled').value);
    const gallons = parseFloat(document.getElementById('gallonsUsed').value);

    result.classList.remove('show');
    error.classList.remove('show');

    if (isNaN(miles) || isNaN(gallons) || miles <= 0 || gallons <= 0) {
      error.textContent = 'Please enter valid numbers greater than 0 for both fields.';
      error.classList.add('show');
      return;
    }

    // Debugged formula: division, not addition
    const mpg = miles / gallons;
    output.textContent = mpg.toFixed(2);
    result.classList.add('show');
  });

  // Allow Enter key to trigger calculation
  document.querySelectorAll('.calc-field input').forEach(input => {
    input.addEventListener('keydown', e => {
      if (e.key === 'Enter') btn.click();
    });
  });
})();



// --- Image Slider ---
(function () {
  const track    = document.getElementById('sliderTrack');
  const dots     = document.querySelectorAll('.dot');
  const thumbs   = document.querySelectorAll('.thumb');
  const bar      = document.getElementById('progressBar');
  if (!track) return;

  const slides = track.querySelectorAll('.slide');
  let current  = 0;
  let timer;
  let barTimer;
  const DELAY  = 4000; // ms between slides

  function goTo(index) {
    // Loop around
    if (index >= slides.length) index = 0;
    if (index < 0) index = slides.length - 1;
    current = index;

    // Move track
    track.style.transform = `translateX(-${current * 100}%)`;

    // Update dots
    dots.forEach((d, i) => d.classList.toggle('active', i === current));

    // Update thumbnails
    thumbs.forEach((t, i) => t.classList.toggle('active', i === current));

    // Reset progress bar
    resetBar();
  }

  function nextSlide() { goTo(current + 1); }
  function prevSlide() { goTo(current - 1); }

  // Auto-play using for-compatible interval
  function startAuto() {
    clearInterval(timer);
    timer = setInterval(nextSlide, DELAY);
  }

  // Progress bar animation
  function resetBar() {
    if (!bar) return;
    bar.style.transition = 'none';
    bar.style.width = '0%';
    clearTimeout(barTimer);
    barTimer = setTimeout(() => {
      bar.style.transition = `width ${DELAY}ms linear`;
      bar.style.width = '100%';
    }, 30);
  }

  // Button listeners
  document.getElementById('btnNext')?.addEventListener('click', () => { goTo(current + 1); startAuto(); });
  document.getElementById('btnPrev')?.addEventListener('click', () => { goTo(current - 1); startAuto(); });

  // Dot listeners using for loop (required by assignment)
  for (let i = 0; i < dots.length; i++) {
    dots[i].addEventListener('click', () => { goTo(i); startAuto(); });
  }

  // Thumbnail listeners using for loop
  for (let i = 0; i < thumbs.length; i++) {
    thumbs[i].addEventListener('click', () => { goTo(i); startAuto(); });
  }

  // Pause on hover
  const wrapper = document.querySelector('.slider-wrapper');
  wrapper?.addEventListener('mouseenter', () => clearInterval(timer));
  wrapper?.addEventListener('mouseleave', startAuto);

  // Kick it off
  goTo(0);
  startAuto();
})();


// INVOICE FORM JS

// --- Invoice Calculator ---
(function () {
  const table     = document.getElementById('invoiceItems');
  const addRowBtn = document.getElementById('addInvoiceRow');
  const subtotalEl = document.getElementById('invSubtotal');
  const totalEl    = document.getElementById('invTotal');
  const taxInput   = document.getElementById('invTax');
  const otherInput = document.getElementById('invOther');
  if (!table) return;

  function calcTotals() {
    let subtotal = 0;

    // Sum all amount fields
    const amountFields = table.querySelectorAll('.amount-field');
    for (let i = 0; i < amountFields.length; i++) {
      const val = parseFloat(amountFields[i].value);
      if (!isNaN(val)) subtotal += val;
    }

    const tax   = parseFloat(taxInput.value)   || 0;
    const other = parseFloat(otherInput.value) || 0;
    const total = subtotal + tax + other;

    subtotalEl.textContent = '$' + subtotal.toFixed(2);
    totalEl.textContent    = '$' + total.toFixed(2);
  }

  function addRow() {
    const tbody = table.querySelector('tbody');
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td><input type="text" placeholder="Item description..." /></td>
      <td><input type="number" class="amount-field" placeholder="0.00" step="0.01" min="0" /></td>`;
    tbody.appendChild(tr);

    // Attach listener to new amount field
    tr.querySelector('.amount-field').addEventListener('input', calcTotals);
  }

  // Add row button
  addRowBtn?.addEventListener('click', addRow);

  // Listeners on existing amount fields
  table.querySelectorAll('.amount-field').forEach(f => {
    f.addEventListener('input', calcTotals);
  });

  // Tax / other cost listeners
  taxInput?.addEventListener('input',   calcTotals);
  otherInput?.addEventListener('input', calcTotals);

  // Print button
  document.getElementById('invPrint')
    ?.addEventListener('click', () => window.print());

  // Reset button
  document.getElementById('invReset')?.addEventListener('click', () => {
    if (confirm('Clear all invoice data?')) {
      document.querySelectorAll('.invoice-field, .invoice-table input, .invoice-footer input, .invoice-meta input')
        .forEach(el => el.value = '');
      taxInput.value   = '';
      otherInput.value = '';
      calcTotals();
    }
  });

  // Init
  calcTotals();
})();


//WEB FORM JS
(function () {
  const form      = document.getElementById('webForm');
  const submitBtn = document.getElementById('wfSubmitBtn');
  const successEl = document.getElementById('wfSuccess');
  const errorEl   = document.getElementById('wfError');

  form.addEventListener('submit', async function (e) {
    e.preventDefault(); // Stop page from redirecting

    // Hide previous messages
    successEl.classList.remove('show');
    errorEl.classList.remove('show');

    // Loading state
    submitBtn.textContent = 'Sending...';
    submitBtn.disabled = true;

    const formData = new FormData(form);

    try {
      const response = await fetch(
        'https://data-driven-web-form-9.42web.io/submit.php',
        { method: 'POST', body: formData }
      );

      if (response.ok) {
        successEl.classList.add('show');
        form.reset();
      } else {
        errorEl.classList.add('show');
      }

    } catch (err) {
      errorEl.classList.add('show');
    }

    // Reset button
    submitBtn.textContent = 'Submit →';
    submitBtn.disabled = false;
  });
})();
