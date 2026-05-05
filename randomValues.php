<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Random Values — Cruz De Los Santos</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<nav class="navbar">
  <div class="nav-inner">
    <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation" aria-expanded="false">☰</button>
    <ul class="nav-menu" id="navMenu">
      <li><a href="index.html">Home</a></li>
      <li class="dropdown">
        <a href="bis23.html">BIS 23 ▾</a>
        <ul class="dropdown-menu">
          <li><a href="equipbudget.html">Equipment Budget</a></li>
          <li><a href="WebtechSeries.html">Web Tech Series</a></li>
          <li><a href="https://cruzd08.github.io/cruzdelossantos.github.io/index.html" target="_blank">Setting Up Web Server</a></li>
          <li><a href="wsproposal3.html">Requirement Documents</a></li>
          <li><a href="https://cruzd08.github.io/CSS-Nav-Menu/" target="_blank">CSS Navigation</a></li>
          <li><a href="debugging.html">Debugging &amp; Pseudo Code</a></li>
          <li><a href="jspresentation.html">JS Presentation</a></li>
          <li><a href="mpgcalculator.html">MPG Calculator</a></li>
          <li><a href="slider.html">Image Slider</a></li>
          <li><a href="airisen.html">AI RISEN</a></li>
          <li><a href="invoice.html">Invoice Form</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="bis31.html">BIS 31 ▾</a>
        <ul class="dropdown-menu">
          <li><a href="researchbusws.html">Research Business Web Sites</a></li>
          <li><a href="https://cruzd08.github.io/cruzdelossantos.github.io/index.html" target="_blank">Setting Up Web Server</a></li>
          <li><a href="wsproposal1.html">Requirement Documents</a></li>
          <li><a href="phpquiz.html">W3Schools PHP Quiz</a></li>
          <li><a href="https://cruzd08.github.io/CSS-Nav-Menu/" target="_blank">CSS Navigation</a></li>
          <li><a href="php_loops.html">PHP Loops</a></li>
          <li><a href="randomValues.php">Random Numbers in PHP</a></li>
          <li><a href="signupform.html">Sign Up Form</a></li>
          <li><a href="webform.html" target="_blank">PHP & MySQL Setup</a></li>
          <li><a href="paycheck.html">Paycheck Calculator</a></li>
        </ul>
      </li>
      <li><a href="bis23projects.html">BIS 23 Projects</a></li>
      <li><a href="bis31projects.html">BIS 31 Projects</a></li>
    </ul>
  </div>
</nav>

<div class="container">

  <div class="page-intro fade-up">
    <span class="badge badge-gold">BIS 31</span>
    <h1>Random Numbers in PHP</h1>
    <p>Two PHP applications using the <code>rand()</code> function — a coin toss simulation and a random number generator across different ranges.</p>
  </div>

  <!-- Part 1 -->
  <div class="flowchart-card fade-up">
    <h2>Part 1 — Coin Toss Simulation</h2>
    <p>Simulates tossing a coin 100 times using a <code>for</code> loop and <code>rand(0,1)</code>. Displays how many times heads and tails occur.</p>

    <pre>&lt;?php
$heads = 0;
$tails = 0;

for ($i = 0; $i &lt; 100; $i++) {
    $coin = rand(0, 1);
    if ($coin == 0) {
        $heads++;
    } else {
        $tails++;
    }
}

echo "Heads: " . $heads . "&lt;br&gt;";
echo "Tails: " . $tails;
?&gt;</pre>

    <div class="output-block">
      <strong>Output:</strong><br>
      <?php
        $heads = 0;
        $tails = 0;
        for ($i = 0; $i < 100; $i++) {
            $coin = rand(0, 1);
            if ($coin == 0) { $heads++; } else { $tails++; }
        }
        echo "Heads: " . $heads . "<br>";
        echo "Tails: " . $tails;
      ?>
    </div>
  </div>

  <!-- Part 2 -->
  <div class="flowchart-card fade-up">
    <h2>Part 2 — Random Number Generation</h2>
    <p>Generates a random number for each of the following ranges using <code>rand(min, max)</code>.</p>

    <pre>&lt;?php
echo "Random number (1-27): "  . rand(1, 27)  . "&lt;br&gt;";
echo "Random number (1-178): " . rand(1, 178) . "&lt;br&gt;";
echo "Random number (1-600): " . rand(1, 600);
?&gt;</pre>

    <div class="output-block">
      <strong>Output:</strong><br>
      <?php
        echo "Random number (1-27): "  . rand(1, 27)  . "<br>";
        echo "Random number (1-178): " . rand(1, 178) . "<br>";
        echo "Random number (1-600): " . rand(1, 600);
      ?>
    </div>
  </div>

</div>

<footer>
  <p>© Copyright 2026. All Rights Reserved.</p>
  <p><a href="mailto:cruzmeirycollado@gmail.com">cruzmeirycollado@gmail.com</a></p>
</footer>

<script src="main.js"></script>
</body>
</html>