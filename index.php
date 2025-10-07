<?php
// Full-fledged standalone front-end page with multiple sections.
// No external build tools or frameworks required.

$institutions = [
  [ 'name' => 'Institution 1', 'tagline' => 'Excellence in education and values.', 'url' => 'https://example.com/institution-1', 'image' => 'https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=1200&auto=format&fit=crop' ],
  [ 'name' => 'Institution 2', 'tagline' => 'Innovative programs for future leaders.', 'url' => 'https://example.com/institution-2', 'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1200&auto=format&fit=crop' ],
  [ 'name' => 'Institution 3', 'tagline' => 'Holistic learning and research.', 'url' => 'https://example.com/institution-3', 'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200&auto=format&fit=crop' ],
  [ 'name' => 'Institution 4', 'tagline' => 'Building character and careers.', 'url' => 'https://example.com/institution-4', 'image' => 'https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=1200&auto=format&fit=crop' ],
  [ 'name' => 'Institution 5', 'tagline' => 'Tradition with modern excellence.', 'url' => 'https://example.com/institution-5', 'image' => 'https://images.unsplash.com/photo-1519455953755-af066f52f1ea?q=80&w=1200&auto=format&fit=crop' ],
  [ 'name' => 'Institution 6', 'tagline' => 'Nurturing minds for tomorrow.', 'url' => 'https://example.com/institution-6', 'image' => 'https://images.unsplash.com/photo-1515573994725-58b4b43f51b7?q=80&w=1200&auto=format&fit=crop' ],
  [ 'name' => 'Institution 7', 'tagline' => 'Committed to quality education.', 'url' => 'https://example.com/institution-7', 'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1200&auto=format&fit=crop' ],
];

function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function safe_url($u) { return filter_var($u, FILTER_VALIDATE_URL) ? $u : '#'; }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SODE Group of Institutions</title>
  <meta name="description" content="Explore institutions under Sode Matha." />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css" />
</head>
<body>
  <!-- Header / Brand Only -->
  <header class="header">
    <div class="container nav">
      <a class="nav-brand" href="/" aria-label="Home">
        <img class="brand-logo" src="https://sode-edu.in/wp-content/uploads/2025/10/sode_logo.webp" alt="SODE Group of Institutions logo" />
        <span class="brand-title">SODE Group of Institutions</span>
      </a>
    </div>
  </header>

  <!-- Hero (Aurora + Marquee) -->
  <section id="home" class="hero hero-aurora">
    <div class="aurora" aria-hidden="true">
      <span class="orb orb-1"></span>
      <span class="orb orb-2"></span>
      <span class="orb orb-3"></span>
    </div>
    <div class="hero-logo-backdrop" style="--hero-logo: url('https://sode-edu.in/wp-content/uploads/2025/10/sode_logo.webp');"></div>
    <div class="container hero-inner">
      <h1>Where values shape futures</h1>
      <p class="lead">Advancing scholarship, character, and community through a constellation of institutions dedicated to service and excellence.</p>
    </div>
    <div class="marquee" aria-hidden="true">
      <div class="marquee__wrap">
        <div class="marquee__track">
          <span>Knowledge</span><span>Character</span><span>Service</span><span>Leadership</span><span>Community</span>
          <span>Knowledge</span><span>Character</span><span>Service</span><span>Leadership</span><span>Community</span>
        </div>
        <div class="marquee__track" aria-hidden="true">
          <span>Knowledge</span><span>Character</span><span>Service</span><span>Leadership</span><span>Community</span>
          <span>Knowledge</span><span>Character</span><span>Service</span><span>Leadership</span><span>Community</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Institutions Grid (moved up) -->
  <section id="institutions" class="section">
    <div class="container">
      <h2 class="section-title">Our Institutions</h2>
      <p class="section-sub">Browse and visit each institution’s site to learn more.</p>
      <div class="inst-grid">
        <?php foreach ($institutions as $idx => $inst):
          $name = h($inst['name'] ?? 'Institution');
          $tagline = h($inst['tagline'] ?? '');
          $url = safe_url($inst['url'] ?? '#');
          $img = isset($inst['image']) ? h($inst['image']) : 'https://images.unsplash.com/photo-1519455953755-af066f52f1ea?q=80&w=1200&auto=format&fit=crop';
        ?>
          <a class="inst-card neon" data-tilt="true" href="<?php echo h($url); ?>" style="--card-bg: url('<?php echo $img; ?>');" aria-label="<?php echo $name; ?>: <?php echo $tagline; ?>" target="_blank" rel="noopener">
            <span class="shine" aria-hidden="true"></span>
            <div class="content">
              <span class="chip">College <?php echo (int) ($idx + 1); ?></span>
              <h4><?php echo $name; ?></h4>
              <p><?php echo $tagline; ?></p>
              <span class="cta" aria-hidden="true">→</span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section id="features" class="section">
    <div class="container">
      <h2 class="section-title">Education with purpose</h2>
      <p class="section-sub">Trusted, value-based education with modern pedagogy, research-driven initiatives, and a vibrant campus life.</p>
      <div class="features">
        <article class="feature-card">
          <h3>Holistic Learning</h3>
          <p>Curriculum and activities that emphasize knowledge, skills, and character.</p>
        </article>
        <article class="feature-card">
          <h3>Modern Infrastructure</h3>
          <p>Well-equipped labs, libraries, and learning spaces to enable excellence.</p>
        </article>
        <article class="feature-card">
          <h3>Research & Innovation</h3>
          <p>Encouraging inquiry and exploration through projects and mentorships.</p>
        </article>
        <article class="feature-card">
          <h3>Community & Values</h3>
          <p>Guided by values that inspire leadership, service, and integrity.</p>
        </article>
      </div>
    </div>
  </section>



  <!-- FAQ -->
  <section id="faq" class="section">
    <div class="container">
      <h2 class="section-title">Frequently asked questions</h2>
      <div class="faq">
        <details>
          <summary>How do I apply?</summary>
          <p>Visit the respective institution’s website and follow the admissions page instructions.</p>
        </details>
        <details>
          <summary>Are scholarships available?</summary>
          <p>Yes, several merit- and need-based scholarships are offered. See each institution’s site for criteria.</p>
        </details>
        <details>
          <summary>How can I schedule a campus visit?</summary>
          <p>Reach out via the contact form below or the institution’s contact page to plan a visit.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="section">
    <div class="container">
      <h2 class="section-title">Get in touch</h2>
      <p class="section-sub">Send us a message and we’ll get back to you soon.</p>
      <form id="contact-form" class="contact" novalidate>
        <div class="form-row">
          <div>
            <label class="label" for="name">Name</label>
            <input class="input" id="name" name="name" placeholder="Your name" required />
          </div>
          <div>
            <label class="label" for="email">Email</label>
            <input class="input" id="email" name="email" type="email" placeholder="you@example.com" required />
          </div>
        </div>
        <div style="margin-top:12px;">
          <label class="label" for="message">Message</label>
          <textarea class="textarea" id="message" name="message" placeholder="How can we help?" required></textarea>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Send Message</button>
          <a href="#home" class="btn btn-ghost">Back to top</a>
        </div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container row">
      <span>© <?php echo date('Y'); ?> SODE Group of Institutions</span>
      <div class="links">
        <a href="#features">Features</a>
        <a href="#institutions">Institutions</a>
        <a href="#contact">Contact</a>
      </div>
    </div>
  </footer>

  <script src="assets/app.js" defer></script>
</body>
</html>
