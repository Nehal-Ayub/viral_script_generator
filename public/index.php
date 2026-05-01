<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Generate high-converting viral scripts for TikTok, Reels, and Shorts in seconds." />
  <title>Viral Script Generator</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/styles.css" />
</head>
<body>
  <div class="bg-glow"></div>
  <header class="topbar container">
    <div class="brand">Viral Script Generator</div>
    <a class="btn btn-ghost" href="#cta">Try for Free</a>
  </header>

  <main>
    <section class="hero container reveal">
      <div class="hero-content">
        <p class="eyebrow">AI for Short-Form Creators</p>
        <h1>Create Viral Scripts in Seconds 🚀</h1>
        <p class="subheading">Generate high-converting TikTok &amp; Reels scripts using AI</p>
        <form id="generator-form" class="generator-card" autocomplete="off">
          <label class="sr-only" for="topic-input">Topic input</label>
          <input id="topic-input" type="text" placeholder="Enter your topic…" required />
          <button type="submit" class="btn btn-primary">Generate Script</button>
        </form>
        <a class="btn btn-secondary cta-inline" href="#cta">Try for Free</a>
      </div>
    </section>

    <section class="container reveal" id="how-it-works">
      <h2>How It Works</h2>
      <div class="grid-3">
        <article class="card step-card">
          <span class="step-number">1</span>
          <h3>Enter topic</h3>
          <p>Type a topic, niche, or product you want a short-form script for.</p>
        </article>
        <article class="card step-card">
          <span class="step-number">2</span>
          <h3>Click generate</h3>
          <p>Our AI crafts a scroll-stopping script structure optimized for retention.</p>
        </article>
        <article class="card step-card">
          <span class="step-number">3</span>
          <h3>Copy and use script</h3>
          <p>Paste directly into your content workflow and record instantly.</p>
        </article>
      </div>
    </section>

    <section class="container reveal" id="features">
      <h2>Features</h2>
      <div class="grid-2">
        <article class="card feature-card"><h3>Viral Hooks</h3><p>Open strong with proven hooks designed to stop the scroll.</p></article>
        <article class="card feature-card"><h3>Engaging Short Scripts</h3><p>Short, punchy copy designed for TikTok, Reels, and Shorts.</p></article>
        <article class="card feature-card"><h3>Ready-to-use CTA</h3><p>Every script includes a clear call-to-action that drives engagement.</p></article>
        <article class="card feature-card"><h3>Works for TikTok, Instagram &amp; YouTube</h3><p>One tool for every major short-form platform.</p></article>
      </div>
    </section>

    <section class="container reveal" id="examples">
      <div class="section-head">
        <h2>Example Output</h2>
        <p>Tap copy and use these formats as inspiration.</p>
      </div>
      <div id="scripts-list" class="grid-3">
        <article class="card script-card">
          <h3>Script #1: Productivity</h3>
          <p class="script-text">Hook: "If you have 10 minutes, you can reset your entire day."<br />Body: "Here are 3 micro-habits I use before noon..."<br />CTA: "Comment 'RESET' and I'll send my routine."</p>
          <button class="btn btn-copy" data-copy-target="0">Copy Script</button>
        </article>
        <article class="card script-card">
          <h3>Script #2: Fitness</h3>
          <p class="script-text">Hook: "Most people fail fat loss in week 2 for this reason."<br />Body: "Stop doing all-or-nothing workouts. Do this instead..."<br />CTA: "Follow for daily 30-second fitness tips."</p>
          <button class="btn btn-copy" data-copy-target="1">Copy Script</button>
        </article>
        <article class="card script-card">
          <h3>Script #3: Business</h3>
          <p class="script-text">Hook: "This one content framework doubled my DMs."<br />Body: "Use Problem -&gt; Proof -&gt; Pitch in every short video..."<br />CTA: "Save this and send it to a creator friend."</p>
          <button class="btn btn-copy" data-copy-target="2">Copy Script</button>
        </article>
      </div>
      <p id="generator-feedback" class="feedback" role="status" aria-live="polite"></p>
    </section>

    <section class="container reveal" id="testimonials">
      <h2>Loved by Creators</h2>
      <div class="grid-3">
        <article class="card quote-card">
          <p>"I used one generated script and got 4x more comments than usual."</p>
          <span>- Sarah M., UGC Creator</span>
        </article>
        <article class="card quote-card">
          <p>"This tool gives me content ideas instantly when I hit creative block."</p>
          <span>- Jason T., Fitness Coach</span>
        </article>
        <article class="card quote-card">
          <p>"The hooks are insanely good. I finally post consistently now."</p>
          <span>- Priya K., Startup Founder</span>
        </article>
      </div>
    </section>

    <section class="container reveal" id="premium">
      <div class="card premium-card">
        <div>
          <h2>Future Premium Upgrade</h2>
          <p>Join the waitlist for advanced script packs, niche templates, and brand voice personalization.</p>
        </div>
        <form id="email-form" class="email-form">
          <label class="sr-only" for="email-input">Email address</label>
          <input id="email-input" type="email" placeholder="Enter your email" required />
          <button type="submit" class="btn btn-primary">Join Waitlist</button>
        </form>
        <p id="email-feedback" class="feedback" role="status" aria-live="polite"></p>
      </div>
    </section>

    <section class="container reveal cta-section" id="cta">
      <h2>Start creating viral content today</h2>
      <a class="btn btn-primary btn-lg" href="#generator-form">Try for Free</a>
    </section>
  </main>

  <footer class="footer">
    <div class="container footer-links">
      <a href="#">About</a>
      <a href="#">Contact</a>
      <a href="#">Privacy Policy</a>
    </div>
  </footer>

  <script src="/assets/js/app.js"></script>
</body>
</html>
