<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Random Address Generators by Country</title>

  
<meta name="description" content="Select a Country for a Random Address." />

  <link rel="stylesheet" href="<?php echo base_url();?>static/css/custom.css">

</head>
<body class="min-h-screen flex flex-col bg-gradient-main">

  <?php echo $header; ?>

  <main class="flex-1">
    <div class="container mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 pt-12 pb-4">
      <!-- Breadcrumb Navigation -->
      <nav class="mb-6" aria-label="Breadcrumb">
        <div class="text-base sm:text-xl lg:text-2xl font-bold text-gray-700" style="display: flex; align-items: center; flex-wrap: wrap; gap: 2px;">
          <a href="<?php echo base_url(); ?>" class="hover:text-blue-600 transition-colors" style="color: inherit; text-decoration: none; flex-shrink: 0;">Home</a>
          <span class="text-gray-400" style="flex-shrink: 0;">/</span>
          <span class="text-gray-900 font-medium" style="flex-shrink: 1; min-width: 0;">All Countries</span>
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
      
      <h1 class="text-3xl lg:text-4xl font-light text-gray-900 mb-8">Random Address Generator by Countries</h1>

      <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100 mb-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
          <?php foreach($country_list as $row): ?>
            <a href="<?php echo base_url();?>random-address-generator/<?php echo strtolower($row->country_code); ?>" 
               class="country-card group block p-4 bg-white/60 hover:bg-white/90 rounded-2xl border-2 border-gray-300 hover:border-blue-400 transition-all duration-300 hover:shadow-xl hover:scale-105 no-underline" 
               style="min-height: 45px !important; height: auto !important;">
              <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                  <?php 
                  $flag_code = strtolower($row->country_code);
                  // 特殊处理：UK使用GB的国旗
                  if($flag_code == 'uk') {
                    $flag_code = 'gb';
                  }
                  ?>
                  <img src="<?php echo base_url();?>static/img/flags/<?php echo $flag_code; ?>_200_150.svg" 
                       alt="<?php echo $row->country; ?> flag" 
                       class="w-14 h-10 object-cover rounded shadow-sm flex-shrink-0"
                       onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
                </div>
                <div class="min-w-0 flex-1">
                  <div class="transition-colors">
                    <span class="country-name"><?php echo $row->country; ?></span>
                    <span class="random-address-text">Random Address</span>
                  </div>
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