<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookie Policy - RandomAddress</title>

  <link href="<?php echo base_url();?>static/css/tailwind.css" rel="stylesheet">
</head>
<body class="min-h-screen flex flex-col bg-gradient-hero">

  <?php echo $header; ?>

  <main class="flex-1">
    <div class="container-main py-12">
      <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-8">Cookie Policy</h1>

      <div class="card p-6 lg:p-10">
        <div class="prose max-w-none">
          <p class="text-gray-700 mb-4"><strong>Last Updated:</strong> <?php echo date('F Y'); ?></p>
          <p class="text-gray-700 mb-6">We use cookies and similar technologies to improve your experience, analyze traffic, and remember preferences. This policy explains what cookies are, which ones we use, and how you can control them.</p>

          <h2 class="text-2xl font-semibold text-gray-900 mt-8 mb-3">What Are Cookies?</h2>
          <p class="text-gray-700 mb-6">Cookies are small text files stored on your device by your browser. They help websites function, measure usage, and personalize content.</p>

          <h2 class="text-2xl font-semibold text-gray-900 mt-8 mb-3">Types of Cookies We Use</h2>
          <ul class="list-disc pl-6 text-gray-700 space-y-2">
            <li><strong>Essential cookies</strong>: Required for core functionality (e.g., page navigation).</li>
            <li><strong>Analytics cookies</strong>: Help us understand how the site is used so we can improve it.</li>
            <li><strong>Preference cookies</strong>: Remember your settings such as language.</li>
          </ul>

          <h2 class="text-2xl font-semibold text-gray-900 mt-8 mb-3">Managing Cookies</h2>
          <p class="text-gray-700 mb-6">You can set your browser to refuse cookies or delete them. Note that disabling cookies may affect site functionality.</p>

          <h2 class="text-2xl font-semibold text-gray-900 mt-8 mb-3">Contact</h2>
          <p class="text-gray-700">Questions? Email us at <a href="mailto:support@randomAddress.com" class="text-primary-600">support@randomAddress.com</a>.</p>
        </div>
      </div>
    </div>
  </main>

  <?php echo $footer; ?>

</body>
</html>
