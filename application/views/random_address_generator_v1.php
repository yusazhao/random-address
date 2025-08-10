<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $is_state_page 变量由控制器传递，无需在这里计算

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if($is_state_page): ?>
    <?php if(array_key_exists($address->country_code,$tier1_array)){ echo $tier1_array[$address->country_code]; }else{echo $address->country; } ?> Random address generator in <?php echo $address->state;?>
  <?php else: ?>
    Random <?php if(array_key_exists($address->country_code,$tier1_array)){ echo $tier1_array[$address->country_code]; }else{echo $address->country; } ?> Address Generator - Free Testing Data | RandomAddress
  <?php endif; ?></title>

  <meta name="description" content="<?php if($is_state_page): ?>
    Generate random <?php if(array_key_exists($address->country_code,$tier1_array)){ echo $tier1_array[$address->country_code]; }else{echo $address->country; } ?> addresses in <?php echo $address->state;?> quickly. Perfect for testing and filling forms with <?php echo $address->state;?>-specific addresses like streets, cities, and zip codes.
  <?php else: ?>
    Generate random <?php if(array_key_exists($address->country_code,$tier1_array)){ echo $tier1_array[$address->country_code]; }else{echo $address->country; } ?> addresses with street, city, state, ZIP code, phone numbers and personal data. Perfect for testing, development, forms and software validation. Free realistic address generator.
  <?php endif; ?>" />
  
  <!-- SEO Meta Tags -->
  <meta name="keywords" content="random address generator, <?php echo strtolower($address->country); ?> addresses, fake address, test data, development tools, address generator, postal codes" />
  <meta name="robots" content="index, follow" />
  <meta name="author" content="RandomAddress" />
  
  <!-- Open Graph Tags -->
  <meta property="og:title" content="Random <?php if(array_key_exists($address->country_code,$tier1_array)){echo $tier1_array[$address->country_code];}else{echo $address->country;} ?> Address Generator" />
  <meta property="og:description" content="Generate random <?php echo $address->country; ?> addresses with street, city, state, ZIP code for testing and development purposes." />
  <meta property="og:url" content="<?php echo current_url(); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="RandomAddress" />
  
  <!-- Twitter Card Tags -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="Random <?php echo $address->country; ?> Address Generator" />
  <meta name="twitter:description" content="Generate random addresses with street, city, state, ZIP code for testing purposes." />


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
          <?php if($is_state_page): ?>
            <a href="<?php echo base_url(); ?>random-address-generator/<?php echo strtolower($address->country_code); ?>" class="hover:text-blue-600 transition-colors" style="color: inherit; text-decoration: none; flex-shrink: 1; min-width: 0;">
              <?php echo $address->country; ?>
            </a>
            <span class="text-gray-400" style="flex-shrink: 0;">/</span>
            <span class="text-gray-900 font-medium" style="flex-shrink: 1; min-width: 0;"><?php echo $address->state; ?> Random Address</span>
          <?php else: ?>
            <span class="text-gray-900 font-medium" style="flex-shrink: 1; min-width: 0;"><?php echo $address->country; ?> Random Address</span>
          <?php endif; ?>
        </div>
        <!-- Hidden breadcrumb for SEO -->
        <ol class="hidden" itemscope itemtype="https://schema.org/BreadcrumbList">
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?php echo base_url(); ?>" itemprop="item"><span itemprop="name">Home</span></a>
            <meta itemprop="position" content="1" />
          </li>
          <?php if($is_state_page): ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <a href="<?php echo base_url(); ?>random-address-generator/<?php echo strtolower($address->country_code); ?>" itemprop="item">
                <span itemprop="name"><?php echo $address->country; ?></span>
              </a>
              <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name"><?php echo $address->state; ?> Random Address</span>
              <meta itemprop="position" content="3" />
            </li>
          <?php else: ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name"><?php echo $address->country; ?> Random Address</span>
              <meta itemprop="position" content="2" />
            </li>
          <?php endif; ?>
        </ol>
      </nav>
      
      <!-- Schema.org structured data -->
      <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "<?php if(array_key_exists($address->country_code,$tier1_array)){echo $tier1_array[$address->country_code];}else{echo $address->country;} ?> Random Address Generator",
        "description": "Generate random <?php echo $address->country; ?> addresses with street, city, state, ZIP code for testing and development",
        "url": "<?php echo current_url(); ?>",
        "applicationCategory": "DeveloperApplication",
        "operatingSystem": "Web Browser",
        "offers": {
          "@type": "Offer",
          "price": "0",
          "priceCurrency": "USD"
        }
      }
      </script>
      
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 gap-4">
        <h1 class="text-3xl lg:text-4xl font-light text-gray-900"><?php if(array_key_exists($address->country_code,$tier1_array)){
          echo $tier1_array[$address->country_code];
        }else{echo $address->country; } ?> Random Address Generator</h1>
        <a href="<?php echo base_url().uri_string(); ?>" 
           class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl transition-all duration-200 hover:shadow-lg sm:shrink-0 no-underline whitespace-nowrap">
          <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
          </svg>
          New Random Address in <?php echo strtoupper($address->country_code); ?>
        </a>
      </div>

      <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100 mb-12">
        <dl class="space-y-6">
                      <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Street</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $address->street; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($address->street); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>
                </button>
              </dd>
            </div>

                      <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">City/Town</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $address->city; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($address->city); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>

                      <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">State/Province/Region</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $address->state; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($address->state); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>

                      <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Zip/Postal Code</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $address->zip_code; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($address->zip_code); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>

                      <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Phone Number</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $address->phone; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($address->phone); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>

                      <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Country</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $address->country; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($address->country); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>
                </button>
              </dd>
            </div>
        </dl>
      </div>


      <div class="mb-12">
        <h2 class="text-3xl lg:text-4xl font-light text-gray-900 mb-6">Random Person Information</h2>
        <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100">
          <?php if($person): ?>
          <dl class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Full Name</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $person->full_name; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($person->full_name); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Gender</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $person->gender; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($person->gender); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Birthday</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $person->birthday; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($person->birthday); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Social Security Number</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $person->ssn; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($person->ssn); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>
          </dl>
          <?php endif; ?>
        </div>
      </div>







      <?php if($creditcard): ?>
      <div class="mb-12">
        <h2 class="text-3xl lg:text-4xl font-light text-gray-900 mb-6">Random Credit Card</h2>
        <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100">
          <dl class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Credit card brand</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $creditcard->creditcard_type; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($creditcard->creditcard_type); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Credit card number</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $creditcard->creditcard_number; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($creditcard->creditcard_number); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Expire</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $creditcard->creditcard_expire; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($creditcard->creditcard_expire); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-300 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">CVV</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium flex items-center justify-between">
                <span><?php echo $creditcard->creditcard_cvv; ?></span>
                <button onclick="copyToClipboard('<?php echo addslashes($creditcard->creditcard_cvv); ?>')" class="copy-btn ml-4 flex items-center">
                  <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                  </svg>

                </button>
              </dd>
            </div>
          </dl>
        </div>
      </div>
      <?php endif; ?>

      <div class="space-y-12">
        <div>
          <h2 class="text-2xl font-light text-gray-900 mb-6">Random address by <?php if(array_key_exists($address->country_code,$tier1_array)){
            echo $tier1_array[$address->country_code];
          }else{echo $address->country; } ?> states</h2>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 gap-4">
            <?php foreach($state_list as $row): ?>
              <a href="<?php echo base_url();?>random-address-generator/<?php echo strtolower($row->country_code);?>-<?php echo strtolower($row->state_code); ?>" class="state-card rounded-xl hover:bg-gradient-to-br hover:from-blue-50 hover:to-blue-100 transition-all duration-300 font-medium border-2 border-gray-300 hover:border-blue-400 hover:shadow-lg transform hover:scale-105 no-underline">
                <div class="text-content">
                  <span class="state-name"><?php echo $row->state; ?></span>
                  <span class="random-address-text">Random Address</span>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="mt-16">
          <h2 class="text-2xl font-light text-gray-900 mb-6">All Countries</h2>
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
                  <div class="text-content">
                    <span class="country-name"><?php echo $row->country; ?></span>
                    <span class="random-address-text">Random Address</span>
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>



        <!-- Informational Content Section -->
        <div class="mt-24 mb-24" style="margin-top: 6rem !important; margin-bottom: 6rem !important;">
          <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100">
            <div class="prose prose-lg max-w-none">
              <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">What's a Random Address Generator?</h2>
              <p class="text-gray-700 leading-relaxed mb-6">
                A Random Address Generator is a web-based tool that creates simulated addresses for a chosen country or region. It randomly picks street, city, and state names, and provides a zip code that matches the selected location.
              </p>

              <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 mt-12">Why Do You Need a Random Address Generator?</h2>
              <p class="text-gray-700 leading-relaxed mb-6">
                Random address generators have several key uses. Let's explore some common scenarios:
              </p>
              <ul class="list-disc pl-6 text-gray-700 leading-relaxed space-y-3 mb-6">
                <li><strong>Privacy Protection:</strong> When you're signing up for something online and worry about sharing your real address, a random address can be a safe alternative, helping to protect your personal details.</li>
                <li><strong>Software Testing:</strong> Developers use these tools to test new applications or websites, ensuring location-based features work correctly without needing real addresses.</li>
                <li><strong>Data Collection:</strong> For researchers and analysts, these generators can create large amounts of address data, which helps with comprehensive studies and deep dives.</li>
                <li><strong>Data Validation:</strong> They assist in cross-checking and confirming the accuracy of address information stored in databases.</li>
              </ul>

              <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 mt-12">How to Use a Random Address Generator</h2>
              <p class="text-gray-700 leading-relaxed mb-6">
                Our Random Address Generator is a user-friendly tool. Just follow these simple steps to generate an address:
              </p>
              <ul class="list-disc pl-6 text-gray-700 leading-relaxed space-y-3 mb-6">
                <li><strong>Select a Country/Region:</strong> Once you're on the tool, you'll see a dropdown menu with various countries. Pick the country you need a random address for. The list includes many options like the U.S., Canada, Australia, Germany, and more, to serve users worldwide.</li>
                <li><strong>Generate the Address:</strong> After choosing your desired country, the random address generator will process your request and instantly provide a random address for that location.</li>
                <li><strong>View Details:</strong> The generated address will include details like the house number, street name, city, state/province, and zip code. Besides the address, personal information is also randomly generated.</li>
                <li><strong>Use the Address:</strong> You can now use this address for your specific needs, whether it's for signing up, testing, or as a placeholder in presentations or documents.</li>
                <li><strong>Generate More Addresses:</strong> If you need another address, simply repeat the process. There's no limit to how many addresses you can generate, but you can only create one at a time.</li>
              </ul>

              <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 mt-12">How Our Random Address Generator Stands Out</h2>
              <p class="text-gray-700 leading-relaxed mb-6">
                What makes our Random Address Generator different is that our data is reliable, and the addresses provided are for real, publicly accessible locations.
              </p>
              <p class="text-gray-700 leading-relaxed mb-6">
                Thanks for using the Random Address Generator!
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

      <?php echo $footer; ?>

  <script src="<?php echo base_url();?>static/js/custom.js"></script>

  

</body>
</html>
