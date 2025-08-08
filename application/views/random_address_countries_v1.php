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
      <h1 class="text-3xl lg:text-4xl font-light text-gray-900 mb-8">Random Address Generator by Countries</h1>

      <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100 mb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach($country_list as $row): ?>
            <a href="<?php echo base_url();?>random-address/<?php echo strtolower($row->country_code); ?>" 
               class="group block p-6 bg-white/50 hover:bg-white/80 rounded-2xl border border-gray-100 hover:border-blue-200 transition-all duration-300 hover:shadow-lg">
              <div class="flex items-center space-x-4">
                <div class="text-3xl">🏠</div>
                <div>
                  <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors"><?php echo $row->country; ?> Random Address</h3>
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