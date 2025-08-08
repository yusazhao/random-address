<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if(array_key_exists($address->country_code,$tier1_array)){
    echo $tier1_array[$address->country_code];
  }else{echo $address->country; } ?> Random address generator in <?php echo $address->state;?></title>

  
<meta name="description" content="Generate random <?php if(array_key_exists($address->country_code,$tier1_array)){
    echo $tier1_array[$address->country_code];
  }else{echo $address->country; } ?> addresses in <?php echo $address->state;?> quickly. Perfect for testing and filling forms with <?php echo $address->state;?>-specific addresses like streets, cities, and zip codes." />


<link href="<?php echo base_url();?>static/css/output.css?v=<?php echo time(); ?>" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-indigo-50">

  <?php echo $header; ?>

  <main class="flex-1">
    <div class="container mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-12">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 gap-4">
        <h1 class="text-3xl lg:text-4xl font-light text-gray-900"><?php if(array_key_exists($address->country_code,$tier1_array)){
          echo $tier1_array[$address->country_code];
        }else{echo $address->country; } ?> Random Address Generator</h1>
        <a href="<?php echo base_url().uri_string(); ?>" 
           class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl transition-all duration-200 hover:shadow-lg sm:shrink-0">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
          </svg>
          New Random Address in <?php echo strtoupper($address->country_code); ?>
        </a>
      </div>

      <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100 mb-12">
        <dl class="space-y-6">
          <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
            <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Street</dt>
            <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $address->street; ?></dd>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
            <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">City/Town</dt>
            <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $address->city; ?></dd>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
            <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">State/Province/Region</dt>
            <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $address->state; ?></dd>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
            <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Zip/Postal Code</dt>
            <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $address->zip_code; ?></dd>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
            <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Phone Number</dt>
            <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $address->phone; ?></dd>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center">
            <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Country</dt>
            <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $address->country; ?></dd>
          </div>
        </dl>
      </div>

      <div class="mb-12">
        <h2 class="text-3xl lg:text-4xl font-light text-gray-900 mb-6">Random Person Information</h2>
        <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100">
          <dl class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Full Name</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $person->full_name; ?></dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Gender</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $person->gender; ?></dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Birthday</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $person->birthday; ?></dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Social Security Number</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $person->ssn; ?></dd>
            </div>
          </dl>
        </div>
      </div>

      <div class="mb-12">
        <h2 class="text-3xl lg:text-4xl font-light text-gray-900 mb-6">Random Credit Card</h2>
        <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100">
          <dl class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Credit card brand</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $creditcard->creditcard_type; ?></dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Credit card number</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $creditcard->creditcard_number; ?></dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center border-b border-gray-100 pb-4">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">Expire</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $creditcard->creditcard_expire; ?></dd>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center">
              <dt class="font-semibold text-gray-800 w-full sm:w-1/3 mb-2 sm:mb-0 text-sm uppercase tracking-wide">CVV</dt>
              <dd class="text-gray-900 sm:w-2/3 text-xl font-medium"><?php echo $creditcard->creditcard_cvv; ?></dd>
            </div>
          </dl>
        </div>
              </div>

      <div class="space-y-12">


        <div>
          <h2 class="text-2xl font-light text-gray-900 mb-6">Random address by <?php if(array_key_exists($address->country_code,$tier1_array)){
            echo $tier1_array[$address->country_code];
          }else{echo $address->country; } ?> states</h2>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
            <?php foreach($state_list as $row): ?>
                              <a href="<?php echo base_url();?>random-address-generator/<?php echo strtolower($row->country_code);?>-<?php echo strtolower($row->state_code); ?>" class="text-blue-600 hover:text-blue-800 px-4 py-3 rounded-xl hover:bg-blue-50 transition-all duration-200 text-center font-medium border border-gray-200 hover:border-blue-300 hover:shadow-sm"><?php echo $row->state; ?> Random Address</a>
            <?php endforeach; ?>
          </div>
        </div>

        <div>
          <h2 class="text-2xl font-light text-gray-900 mb-6">All Countries</h2>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
            <?php foreach($country_list as $row): ?>
              <a href="<?php echo base_url();?>random-address-generator/<?php echo strtolower($row->country_code); ?>" class="text-blue-600 hover:text-blue-800 px-4 py-3 rounded-xl hover:bg-blue-50 transition-all duration-200 text-center font-medium border border-gray-200 hover:border-blue-300 hover:shadow-sm"><?php echo $row->country; ?> Random Address</a>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Informational Content Section -->
        <div class="mt-16">
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

</body>
</html>