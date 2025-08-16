<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Random Address Generators by Country</title>

  
<meta name="description" content="Select a Country for a Random Address." />

  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo current_url(); ?>" />

  <link rel="stylesheet" href="<?php echo base_url();?>static/css/tailwind.css">

</head>
<body class="bg-gradient-hero min-h-screen flex flex-col">

  <?php echo $header; ?>

  <main class="flex-1">
    <div class="container-main pt-8 pb-4">
      <!-- Breadcrumb Navigation -->
      <nav class="mb-6" aria-label="Breadcrumb">
        <div class="flex items-center flex-wrap gap-2 text-base sm:text-lg lg:text-xl font-bold text-gray-700">
          <a href="<?php echo base_url(); ?>" class="breadcrumb-link">Home</a>
          <span class="breadcrumb-separator">/</span>
          <span class="breadcrumb-current">All Countries</span>
        </div>
        <!-- Hidden breadcrumb for SEO -->
        <ol class="hidden" itemscope itemtype="https://schema.org/BreadcrumbList">
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?php echo base_url(); ?>" itemprop="item"><span itemprop="name">Home</span></a>
            <meta itemprop="position" content="1" />
          </li>
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name">All Countries</span>
            <meta itemprop="position" content="2" />
          </li>
        </ol>
      </nav>
      
      <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-8 text-center animate-fade-in">
        Random Address Generator by Countries
      </h1>

      <div class="glass rounded-3xl p-6 lg:p-10 shadow-large mb-12 animate-slide-up">
        <div class="grid-countries">
          <?php foreach($country_list as $row): ?>
            <a href="<?php echo base_url();?>random-address-generator/<?php echo strtolower($row->country_code); ?>" 
               class="country-card">
              <div class="country-card-content">
                <div class="country-flag">
                  <?php 
                  $flag_code = strtolower($row->country_code);
                  // 特殊处理：UK使用GB的国旗
                  if($flag_code == 'uk') {
                    $flag_code = 'gb';
                  }
                  ?>
                  <img src="<?php echo base_url();?>static/img/flags/<?php echo $flag_code; ?>_200_150.svg" 
                       alt="<?php echo $row->country; ?> flag" 
                       onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
                </div>
                <div class="country-info">
                  <span class="country-name"><?php echo $row->country; ?></span>
                  <span class="random-address-text">Random Address</span>
                </div>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </main>

  <?php echo $footer; ?>

</body>
</html>