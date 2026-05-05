<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paycheck Result</title>
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
    <h1>Paycheck Calculator</h1>
  </div>

  <div class="wf-card fade-up delay-1">

    <?php
      $hours  = $_POST['hours'];
      $rate   = $_POST['rate'];
      $salary = $hours * $rate;
    ?>

    <div class="wf-icon">💵</div>
    <h2 class="wf-title">Paycheck Result</h2>

    <div class="calc-divider">calculation summary</div>

    <div class="pay-result">
      <p class="pay-label">Total Salary</p>
      <p class="pay-amount">$<?php echo number_format($salary, 2); ?></p>
      <p class="pay-breakdown">
        <?php echo $hours; ?> hours × $<?php echo number_format($rate, 2); ?>/hr
      </p>
    </div>

    <a href="paycheck.html" class="calc-btn"
       style="display:block; text-align:center; text-decoration:none; margin-top:24px;">
      ← Calculate Again
    </a>

  </div>

</div>

<footer>
  <p>© Copyright 2026. All Rights Reserved.</p>
  <p><a href="mailto:cruzmeirycollado@gmail.com">cruzmeirycollado@gmail.com</a></p>
</footer>

<script src="main.js"></script>
</body>
</html>