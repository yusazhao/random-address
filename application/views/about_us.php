<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About US - RandomAddress</title>

<link href="<?php echo base_url();?>static/css/output.css?v=<?php echo time(); ?>" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-indigo-50">

  <?php echo $header; ?>

  <main class="flex-1">
    <div class="container mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 py-12">
      <h1 class="text-3xl lg:text-4xl font-light text-gray-900 mb-8">About Us</h1>

      <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 lg:p-10 shadow-lg border border-gray-100">
        <div class="prose prose-lg max-w-none">
          <p class="text-gray-700 text-lg leading-relaxed mb-6">
            Welcome to RandomAddress—your go-to hub for generating all kinds of random data! Whether you need random address, secure passwords, fake identities, UUIDs, lottery numbers, or other random values, we've got you covered. Our goal is to provide fast, reliable, and easy-to-use random data generation tools for developers, researchers, and anyone who needs them.
          </p>

          <p class="text-gray-700 text-lg leading-relaxed">
            With a focus on simplicity and efficiency, RandomAddress ensures that you get high-quality random data with just a click. Explore our collection of generators and make randomness work for you!
          </p>
        </div>
      </div>
    </div>
  </main>

  <?php echo $footer; ?>

</body>
</html>