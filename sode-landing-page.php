<?php
/*
Template Name: SODE Landing Page
Description: Mobile-friendly responsive landing page with seven institution tiles.
*/

get_header();

// Editable list of institutions. Replace URLs and taglines with real values.
$institutions = [
  [
    'name' => 'Institution 1',
    'tagline' => 'Excellence in education and values.',
    'url' => 'https://example.com/institution-1'
  ],
  [
    'name' => 'Institution 2',
    'tagline' => 'Innovative programs for future leaders.',
    'url' => 'https://example.com/institution-2'
  ],
  [
    'name' => 'Institution 3',
    'tagline' => 'Holistic learning and research.',
    'url' => 'https://example.com/institution-3'
  ],
  [
    'name' => 'Institution 4',
    'tagline' => 'Building character and careers.',
    'url' => 'https://example.com/institution-4'
  ],
  [
    'name' => 'Institution 5',
    'tagline' => 'Tradition with modern excellence.',
    'url' => 'https://example.com/institution-5'
  ],
  [
    'name' => 'Institution 6',
    'tagline' => 'Nurturing minds for tomorrow.',
    'url' => 'https://example.com/institution-6'
  ],
  [
    'name' => 'Institution 7',
    'tagline' => 'Committed to quality education.',
    'url' => 'https://example.com/institution-7'
  ],
];
?>

<style>
  /* Import fonts (falls back to system fonts if blocked) */
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap');

  :root {
    --kumkum: #7B1436; /* primary accent */
    --chandan: #C59048; /* secondary accent */
    --neel: #122147; /* deep blue */
    --text: #0f1529; /* near-black for good contrast */
    --muted: #5c637e; /* muted text */
    --surface: #ffffff;
    --surface-2: #f6f7fb;
    --radius: 16px;
    --shadow-sm: 0 4px 10px rgba(18, 33, 71, 0.08);
    --shadow-md: 0 10px 24px rgba(18, 33, 71, 0.15);
    --shadow-lg: 0 18px 40px rgba(18, 33, 71, 0.22);
    --focus: 0 0 0 3px rgba(197, 144, 72, 0.35), 0 0 0 6px rgba(18, 33, 71, 0.2);
  }

  .sode-landing {
    font-family: 'Poppins', 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    color: var(--text);
    /* Subtle gradient using Neel + Kumkum over a light neutral */
    background:
      radial-gradient(1200px 600px at 10% -10%, rgba(123, 20, 54, 0.08), transparent 60%),
      radial-gradient(1200px 600px at 110% 10%, rgba(18, 33, 71, 0.12), transparent 55%),
      linear-gradient(180deg, #fbfcff, #f8f9fd 30%, #f6f7fb);
    min-height: 70vh;
    padding: clamp(20px, 4vw, 40px) 0 60px;
  }

  .sode-wrap {
    width: min(1120px, 92%);
    margin: 0 auto;
    text-align: center;
  }

  .sode-logo {
    display: block;
    margin: 0 auto 14px;
    width: clamp(96px, 20vw, 140px);
    height: auto;
    filter: drop-shadow(0 4px 12px rgba(18, 33, 71, 0.15));
  }

  .sode-title {
    margin: 6px 0 18px;
    font-size: clamp(24px, 3.6vw, 42px);
    font-weight: 700;
    letter-spacing: 0.3px;
    color: var(--neel);
  }

  .sode-sub {
    color: var(--muted);
    max-width: 760px;
    margin: 0 auto 28px;
    font-size: clamp(14px, 1.9vw, 16px);
  }

  .sode-divider {
    width: 92px;
    height: 4px;
    background: linear-gradient(90deg, var(--kumkum), var(--chandan));
    border-radius: 999px;
    margin: 0 auto 34px;
  }

  .sode-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: clamp(14px, 2.8vw, 22px);
    margin-top: 6px;
  }

  .sode-card {
    position: relative;
    display: block;
    border-radius: var(--radius);
    background: linear-gradient(180deg, var(--surface), var(--surface-2));
    box-shadow: var(--shadow-sm);
    padding: 22px 20px 20px;
    text-align: left;
    color: inherit;
    text-decoration: none;
    outline: none;
    transition: transform 220ms ease, box-shadow 220ms ease, background 220ms ease;
    border: 1px solid rgba(18, 33, 71, 0.06);
  }

  .sode-card:hover,
  .sode-card:focus-visible {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    background: var(--surface);
  }

  .sode-card:active {
    transform: translateY(-1px);
    box-shadow: var(--shadow-lg);
  }

  .sode-chip {
    display: inline-block;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.4px;
    text-transform: uppercase;
    color: #fff;
    background: linear-gradient(90deg, var(--kumkum), var(--neel));
    padding: 6px 10px;
    border-radius: 999px;
    margin-bottom: 12px;
  }

  .sode-card h3 {
    margin: 2px 0 6px;
    font-size: clamp(17px, 2.2vw, 20px);
    color: var(--neel);
  }

  .sode-card p {
    margin: 0;
    color: var(--muted);
    font-size: 14px;
    line-height: 1.5;
  }

  .sode-card .sode-arrow {
    position: absolute;
    right: 14px;
    bottom: 14px;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: linear-gradient(90deg, var(--chandan), var(--kumkum));
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    box-shadow: 0 6px 14px rgba(123, 20, 54, 0.25);
    transform: translateY(0);
    transition: transform 220ms ease, box-shadow 220ms ease;
  }

  .sode-card:hover .sode-arrow,
  .sode-card:focus-visible .sode-arrow {
    transform: translateY(-2px);
    box-shadow: 0 10px 18px rgba(18, 33, 71, 0.28);
  }

  /* Respect reduced motion preferences */
  @media (prefers-reduced-motion: reduce) {
    .sode-card {
      transition: none;
    }
    .sode-card:hover,
    .sode-card:focus-visible,
    .sode-card .sode-arrow,
    .sode-card:hover .sode-arrow,
    .sode-card:focus-visible .sode-arrow {
      transform: none;
      transition: none;
    }
  }
</style>

<main id="primary" class="site-main sode-landing">
  <div class="sode-wrap">
    <img class="sode-logo" src="https://sode-edu.in/wp-content/uploads/2025/10/sode_logo.webp" alt="SODE Group of Institutions logo" loading="eager" />

    <h1 class="sode-title">SODE Group of Institutions</h1>
    <p class="sode-sub">Explore our institutions under Sode Matha. Click a card to visit the respective website.</p>
    <div class="sode-divider" aria-hidden="true"></div>

    <section class="sode-grid" aria-label="Institutions">
      <?php foreach ($institutions as $idx => $inst): ?>
        <?php
          $name = isset($inst['name']) ? esc_html($inst['name']) : 'Institution';
          $tagline = isset($inst['tagline']) ? esc_html($inst['tagline']) : '';
          $url = isset($inst['url']) ? esc_url($inst['url']) : '#';
        ?>
        <a class="sode-card" href="<?php echo $url; ?>" aria-label="<?php echo $name; ?>: <?php echo $tagline; ?>">
          <span class="sode-chip">College <?php echo (int) ($idx + 1); ?></span>
          <h3><?php echo $name; ?></h3>
          <p><?php echo $tagline; ?></p>
          <span class="sode-arrow" aria-hidden="true">→</span>
        </a>
      <?php endforeach; ?>
    </section>
  </div>
</main>

<script>
  // Enhance keyboard focus visibility for card grid
  (function () {
    const cards = document.querySelectorAll('.sode-card');
    cards.forEach((card) => {
      card.addEventListener('focus', () => { card.style.boxShadow = getComputedStyle(document.documentElement).getPropertyValue('--shadow-md'); card.style.outline = 'none'; });
      card.addEventListener('blur', () => { card.style.boxShadow = ''; });
    });
  })();
</script>

<?php get_footer(); ?>
