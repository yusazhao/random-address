<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Random Address Generators by Country</title>

  
<meta name="description" content="Explore a comprehensive list of random address generators by country, providing users with reliable, country-specific address data for various uses such as testing, form-filling, and more." />

<link href="<?php echo base_url();?>static/css/output.css?v=<?php echo time(); ?>" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-indigo-50">

  <?php echo $header; ?>

  <main class="flex-1">
    <div class="container mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-12">
      <!-- Breadcrumb Navigation -->
      <nav class="mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-1 sm:space-x-2 text-sm sm:text-lg font-bold text-gray-600 whitespace-nowrap overflow-hidden" itemscope itemtype="https://schema.org/BreadcrumbList">
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="flex-shrink-0">
            <a href="<?php echo base_url(); ?>" class="hover:text-blue-600 transition-colors" itemprop="item">
              <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1" />
          </li>
          <li class="text-gray-400 flex-shrink-0">/</li>
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="flex-shrink-0 min-w-0">
            <span class="text-gray-900 font-medium truncate" itemprop="name">All Countries</span>
            <meta itemprop="position" content="2" />
          </li>
        </ol>
      </nav>
      
      <h1 class="text-3xl lg:text-4xl font-light text-gray-900 mb-8">Random Address Generator by Countries</h1>

      <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100 mb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach($country_list as $row): ?>
                            <a href="<?php echo base_url();?>random-address-generator/<?php echo strtolower($row->country_code); ?>" 
               class="group block p-6 bg-white/50 hover:bg-white/80 rounded-2xl border border-gray-100 hover:border-blue-200 transition-all duration-300 hover:shadow-lg">
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
                       class="w-12 h-9 object-cover rounded shadow-sm"
                       onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
                </div>
                <div>
                  <h3 class="font-semibold transition-colors">
                    <span class="text-blue-700 group-hover:text-blue-800"><?php echo $row->country; ?></span>
                    <span class="text-gray-600 group-hover:text-gray-700"> Random Address</span>
                  </h3>
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