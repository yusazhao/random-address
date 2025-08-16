<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $is_state_page 变量由控制器传递，无需在这里计算

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if(isset($is_city_page) && $is_city_page): ?>
    Free Random <?php echo $address->city; ?>, <?php echo strtoupper($address->state_code); ?> address generator | Real & Valid
  <?php elseif($is_state_page): ?>
    Free Random <?php if(array_key_exists($address->country_code,$tier1_array)){ echo $tier1_array[$address->country_code]; }else{echo $address->country; } ?> Address Generator | For Any State
  <?php else: ?>
    Free Random <?php if(array_key_exists($address->country_code,$tier1_array)){ echo $tier1_array[$address->country_code]; }else{echo $address->country; } ?> Address Generator
  <?php endif; ?></title>

  <meta name="description" content="High-quality random address generator provides real <?php if(array_key_exists($address->country_code,$tier1_array)){ echo $tier1_array[$address->country_code]; }else{echo $address->country; } ?> addresses that ensure 100% success for your account registrations. Simply click to copy and paste." />
  
  <!-- SEO Meta Tags -->
  <meta name="keywords" content="random address, random address generator, random <?php echo strtolower($address->country); ?> addresses generator, fake address, fake address generator" />
  <meta name="robots" content="index, follow" />
  <meta name="author" content="RandomAddress" />
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo current_url(); ?>" />
  
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

  <link rel="stylesheet" href="<?php echo base_url();?>static/css/tailwind.css">
</head>
<body class="bg-gradient-hero min-h-screen flex flex-col">

  <?php echo $header; ?>

  <main class="flex-1">
    <div class="container-main pt-8 pb-4">
      <!-- Breadcrumb Navigation -->
      <nav class="mb-8" aria-label="Breadcrumb">
        <div class="flex items-center flex-wrap gap-1 text-base font-bold text-gray-700">
          <a href="<?php echo base_url(); ?>" class="breadcrumb-link">Home</a>
          <span class="breadcrumb-separator">/</span>
          <?php if(isset($is_city_page) && $is_city_page): ?>
            <a href="<?php echo base_url(); ?>random-address-generator/<?php echo strtolower($address->country_code); ?>" class="breadcrumb-link">
              <?php echo $address->country; ?>
            </a>
            <span class="breadcrumb-separator">/</span>
            <a href="<?php echo base_url(); ?>random-address-generator/<?php echo strtolower($address->country_code); ?>-<?php echo strtolower($address->state_code); ?>" class="breadcrumb-link">
              <?php echo $address->state; ?>
            </a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-current"><?php echo $address->city; ?> Random Address</span>
          <?php elseif($is_state_page): ?>
            <a href="<?php echo base_url(); ?>random-address-generator/<?php echo strtolower($address->country_code); ?>" class="breadcrumb-link">
              <?php echo $address->country; ?>
            </a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-current"><?php echo $address->state; ?> Random Address</span>
          <?php else: ?>
            <span class="breadcrumb-current"><?php echo $address->country; ?> Random Address</span>
          <?php endif; ?>
        </div>
        <!-- Hidden breadcrumb for SEO -->
        <ol class="hidden" itemscope itemtype="https://schema.org/BreadcrumbList">
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?php echo base_url(); ?>" itemprop="item"><span itemprop="name">Home</span></a>
            <meta itemprop="position" content="1" />
          </li>
          <?php if(isset($is_city_page) && $is_city_page): ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <a href="<?php echo base_url(); ?>random-address-generator/<?php echo strtolower($address->country_code); ?>" itemprop="item">
                <span itemprop="name"><?php echo $address->country; ?></span>
              </a>
              <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <a href="<?php echo base_url(); ?>random-address-generator/<?php echo strtolower($address->country_code); ?>-<?php echo strtolower($address->state_code); ?>" itemprop="item">
                <span itemprop="name"><?php echo $address->state; ?></span>
              </a>
              <meta itemprop="position" content="3" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name"><?php echo $address->city; ?> Random Address</span>
              <meta itemprop="position" content="4" />
            </li>
          <?php elseif($is_state_page): ?>
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
      
      <!-- Header Section with Title and Refresh Button -->
      <div class="text-center mb-12">
        <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6 animate-fade-in">
          <?php if(array_key_exists($address->country_code,$tier1_array)){
            echo $tier1_array[$address->country_code];
          }else{echo $address->country; } ?> Address Generator
        </h1>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto animate-slide-up">
          Generate authentic random addresses for <?php echo $address->country; ?> with complete personal information and contact details.
        </p>
        
        <a href="<?php echo base_url().uri_string(); ?>" 
           class="btn btn-primary text-base px-8 py-4 animate-bounce-soft">
          <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
          </svg>
          Generate New Address
        </a>
      </div>

      <!-- Main Content Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
        
        <!-- Address Information Card -->
        <div class="lg:col-span-2">
          <div class="card card-hover">
            <div class="card-header">
              <h2 class="text-2xl font-bold text-white flex items-center">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Address Details
              </h2>
            </div>
            <div class="card-body">
              <div class="space-y-4">
                <div class="address-field">
                  <div class="address-field-header">
                    <div class="address-field-dot bg-primary-500"></div>
                    <span class="address-field-text">Street</span>
                  </div>
                  <div class="address-field-content">
                    <span class="address-field-value"><?php echo $address->street; ?></span>
                    <button onclick="copyToClipboard('<?php echo addslashes($address->street); ?>')" 
                            class="copy-btn bg-primary-100 hover:bg-primary-200">
                      <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                      </svg>
                    </button>
                  </div>
                </div>

                <div class="address-field">
                  <div class="address-field-header">
                    <div class="address-field-dot bg-secondary-500"></div>
                    <span class="address-field-text">City/Town</span>
                  </div>
                  <div class="address-field-content">
                    <span class="address-field-value"><?php echo $address->city; ?></span>
                    <button onclick="copyToClipboard('<?php echo addslashes($address->city); ?>')" 
                            class="copy-btn bg-secondary-100 hover:bg-secondary-200">
                      <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                      </svg>
                    </button>
                  </div>
                </div>

                <div class="address-field">
                  <div class="address-field-header">
                    <div class="address-field-dot bg-success-500"></div>
                    <span class="address-field-text">State/Province</span>
                  </div>
                  <div class="address-field-content">
                    <span class="address-field-value"><?php echo $address->state; ?></span>
                    <button onclick="copyToClipboard('<?php echo addslashes($address->state); ?>')" 
                            class="copy-btn bg-success-100 hover:bg-success-200">
                      <svg class="w-4 h-4 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                      </svg>
                    </button>
                  </div>
                </div>

                <div class="address-field">
                  <div class="address-field-header">
                    <div class="address-field-dot bg-warning-500"></div>
                    <span class="address-field-text">Zip Code</span>
                  </div>
                  <div class="address-field-content">
                    <span class="address-field-value"><?php echo $address->zip_code; ?></span>
                    <button onclick="copyToClipboard('<?php echo addslashes($address->zip_code); ?>')" 
                            class="copy-btn bg-warning-100 hover:bg-warning-200">
                      <svg class="w-4 h-4 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                      </svg>
                    </button>
                  </div>
                </div>

                <div class="address-field">
                  <div class="address-field-header">
                    <div class="address-field-dot bg-danger-500"></div>
                    <span class="address-field-text">Phone Number</span>
                  </div>
                  <div class="address-field-content">
                    <span class="address-field-value"><?php echo $address->phone; ?></span>
                    <button onclick="copyToClipboard('<?php echo addslashes($address->phone); ?>')" 
                            class="copy-btn bg-danger-100 hover:bg-danger-200">
                      <svg class="w-4 h-4 text-danger-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Person Information Card -->
        <div class="lg:col-span-1">
          <div class="card card-hover">
            <div class="bg-gradient-to-r from-success-500 to-success-600 px-6 py-4">
              <h2 class="text-2xl font-bold text-white flex items-center">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Person Info
              </h2>
            </div>
            <div class="card-body">
              <?php if($person): ?>
              <div class="space-y-4">
                <div class="text-center mb-6">
                  <div class="person-avatar">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                  </div>
                  <div class="flex items-center justify-center gap-3 mb-2">
                    <h3 class="person-name"><?php echo $person->full_name; ?></h3>
                    <button onclick="copyToClipboard('<?php echo addslashes($person->full_name); ?>')" 
                            class="copy-btn bg-success-100 hover:bg-success-200 p-2 rounded-lg">
                      <svg class="w-4 h-4 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                      </svg>
                    </button>
                  </div>
                  <p class="person-gender"><?php echo $person->gender; ?></p>
                </div>

                <div class="space-y-3">
                  <div class="flex items-center justify-between p-3 bg-success-50 rounded-lg">
                    <span class="font-medium text-gray-700">Birthday</span>
                    <div class="flex items-center gap-2">
                      <span class="text-gray-900 font-semibold"><?php echo $person->birthday; ?></span>
                      <button onclick="copyToClipboard('<?php echo addslashes($person->birthday); ?>')" 
                              class="copy-btn bg-success-100 hover:bg-success-200">
                        <svg class="w-4 h-4 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                  
                  <div class="flex items-center justify-between p-3 bg-success-50 rounded-lg">
                    <span class="font-medium text-gray-700">SSN</span>
                    <div class="flex items-center gap-2">
                      <span class="text-gray-900 font-semibold"><?php echo $person->ssn; ?></span>
                      <button onclick="copyToClipboard('<?php echo addslashes($person->ssn); ?>')" 
                              class="copy-btn bg-success-100 hover:bg-success-200">
                        <svg class="w-4 h-4 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Navigation Sections -->
      <div class="space-y-16">
        <?php if(!empty($state_list)): ?>
        <div>
          <div class="text-center mb-10">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Browse by States</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Explore random addresses from different states across <?php echo $address->country; ?></p>
          </div>
          <div class="grid-states">
            <?php foreach($state_list as $row): ?>
              <a href="<?php echo base_url();?>random-address-generator/<?php echo strtolower($row->country_code);?>-<?php echo strtolower($row->state_code); ?>" 
                 class="group block p-4 bg-white hover:bg-gradient-to-br hover:from-primary-50 hover:to-secondary-50 rounded-xl border border-gray-200 hover:border-primary-300 transition-all duration-300 hover:shadow-medium transform hover:-translate-y-1 no-underline text-center">
                <div class="space-y-1">
                  <div class="text-gray-800 group-hover:text-primary-700 font-bold text-lg lg:text-xl leading-tight">
                    <?php echo $row->state; ?>
                  </div>
                  <div class="text-gray-500 group-hover:text-primary-500 text-xs font-medium whitespace-nowrap">
                    Random Address
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <?php if(!empty($major_cities)): ?>
        <div>
          <div class="text-center mb-10">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Major Cities</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Get random addresses from the most popular cities in <?php echo $address->country; ?></p>
          </div>
          <div class="grid-cities">
            <?php foreach($major_cities as $city): ?>
              <a href="<?php echo base_url();?>random-address-generator/<?php echo strtolower($city->country_code);?>-<?php echo strtolower($city->state_code);?>/<?php echo $city->city_slug;?>" 
                 class="group block p-4 bg-white hover:bg-gradient-to-br hover:from-success-50 hover:to-success-100 rounded-xl border border-gray-200 hover:border-success-300 transition-all duration-300 hover:shadow-medium transform hover:-translate-y-1 no-underline text-center">
                <div class="space-y-1">
                  <div class="text-gray-800 group-hover:text-success-700 font-bold text-lg lg:text-xl leading-tight">
                    <?php echo htmlspecialchars($city->city); ?>
                  </div>
                  <div class="text-gray-500 group-hover:text-success-500 text-xs font-medium whitespace-nowrap">
                    Random Address
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <div>
          <div class="text-center mb-10">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">All Countries</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Generate random addresses from over 50 countries worldwide</p>
          </div>
          <div class="grid-countries">
            <?php foreach($country_list as $row): ?>
              <?php if(strtolower($row->country_code) != strtolower($address->country_code)): ?>
              <a href="<?php echo base_url();?>random-address-generator/<?php echo strtolower($row->country_code); ?>" 
                 class="country-card" 
                 style="min-height: 60px;">
                <div class="country-card-content">
                  <div class="country-flag">
                    <?php 
                    $flag_code = strtolower($row->country_code);
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
                  </div>
                </div>
              </a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- FAQ Section -->
        <div class="mt-20">
          <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Everything you need to know about our random address generator</p>
          </div>

          <div class="card p-8 lg:p-12">
            <div class="prose prose-lg max-w-none">
              <div class="faq-item">
                <h3 class="faq-title">
                  <div class="faq-icon bg-primary-100">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </div>
                  What's a Random Address Generator?
                </h3>
                <p class="faq-content">
                  A random address generator is a tool that displays a random local address in a chosen country, including the street number, street name, city, and state. It also provides personal information and a zip code that matches the selected location.
                </p>
              </div>

              <div class="faq-item">
                <h3 class="faq-title">
                  <div class="faq-icon bg-secondary-100">
                    <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                  </div>
                  Why Do You Need a Random Address Generator?
                </h3>
                <p class="faq-content mb-6">
                  Random address generators have several key uses. Let's explore some common scenarios:
                </p>
                <div class="grid md:grid-cols-2 gap-6">
                  <div class="bg-primary-50 p-6 rounded-xl">
                    <h4 class="font-bold text-primary-800 mb-3">Privacy Protection</h4>
                    <p class="text-primary-700">When you're signing up for something online and worry about sharing your real address, a random address can be a safe alternative, helping to protect your personal details.</p>
                  </div>
                  <div class="bg-secondary-50 p-6 rounded-xl">
                    <h4 class="font-bold text-secondary-800 mb-3">Software Testing</h4>
                    <p class="text-secondary-700">Developers use these tools to test new applications or websites, ensuring location-based features work correctly without needing real addresses.</p>
                  </div>
                </div>
              </div>

              <div class="faq-item">
                <h3 class="faq-title">
                  <div class="faq-icon bg-success-100">
                    <svg class="w-5 h-5 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                  </div>
                  How to Use Our Generator
                </h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                  <div class="bg-success-50 p-6 rounded-xl">
                    <div class="w-12 h-12 bg-success-100 rounded-lg flex items-center justify-center mb-4">
                      <span class="text-success-600 font-bold text-xl">1</span>
                    </div>
                    <h4 class="font-bold text-success-800 mb-3">Choose Country</h4>
                    <p class="text-success-700">Browse through our "All Countries" section or select from specific states. We support over 50 countries worldwide.</p>
                  </div>
                  <div class="bg-success-50 p-6 rounded-xl">
                    <div class="w-12 h-12 bg-success-100 rounded-lg flex items-center justify-center mb-4">
                      <span class="text-success-600 font-bold text-xl">2</span>
                    </div>
                    <h4 class="font-bold text-success-800 mb-3">Instant Generation</h4>
                    <p class="text-success-700">Simply click on any country or state link - no forms to fill out. Your random address generates automatically.</p>
                  </div>
                  <div class="bg-success-50 p-6 rounded-xl">
                    <div class="w-12 h-12 bg-success-100 rounded-lg flex items-center justify-center mb-4">
                      <span class="text-success-600 font-bold text-xl">3</span>
                    </div>
                    <h4 class="font-bold text-success-800 mb-3">Copy & Use</h4>
                    <p class="text-success-700">Click the copy button next to any data field to instantly copy it to your clipboard. Each piece can be copied individually.</p>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-6">How Our Generator Stands Out</h3>
                <p class="faq-content">
                  What makes our Random Address Generator different is that our data is reliable, and the addresses provided are for real, publicly accessible locations.
                </p>
                <p class="faq-content mt-4">
                  Thanks for using the Random Address Generator!
                </p>
              </div>
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
