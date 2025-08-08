<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RandomAddress - Professional Random Data Generator</title>
    <link href="<?php echo base_url();?>static/css/output.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }
        .feature-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            border-color: rgba(59, 130, 246, 0.3);
        }
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            box-shadow: 0 4px 14px 0 rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px 0 rgba(59, 130, 246, 0.4);
        }
        .text-gradient {
            background: linear-gradient(135deg, #1f2937 0%, #4b5563 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <?php echo $header; ?>

        <main class="flex-1">
            <!-- Hero Section -->
            <section class="hero-section py-20 lg:py-32">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-4xl mx-auto text-center">
                        <h1 class="text-5xl lg:text-7xl font-light text-gradient mb-8 tracking-tight">
                            RandomAddress
                        </h1>
                        <p class="text-xl lg:text-2xl text-gray-600 mb-12 font-light leading-relaxed">
                            Professional random data generation.<br>
                            Simple. Reliable. Beautiful.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="<?php echo base_url();?>random-address-generator/us" class="btn-primary text-white px-8 py-4 rounded-full text-lg font-medium">
                                Get Started
                            </a>

                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="py-20 lg:py-32">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12 max-w-6xl mx-auto">
                        
                        <!-- Random Address -->
                        <div class="feature-card rounded-3xl p-8 lg:p-10">
                            <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-8">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl lg:text-3xl font-light text-gray-900 mb-4">Random Address</h2>
                            <p class="text-gray-600 mb-8 leading-relaxed">Generate authentic addresses from countries worldwide for testing and development.</p>
                            <div class="space-y-3">
                                                <a href="<?php echo base_url();?>random-address-generator/us" class="btn-primary text-white rounded-full px-6 py-3 block text-center font-medium">US Address</a>
                <a href="<?php echo base_url();?>random-address-generator/ca" class="btn-primary text-white rounded-full px-6 py-3 block text-center font-medium">CA Address</a>
                <a href="<?php echo base_url();?>random-address-generator/uk" class="btn-primary text-white rounded-full px-6 py-3 block text-center font-medium">UK Address</a>
                <a href="<?php echo base_url();?>random-address-generator-countries" class="bg-gray-100 text-gray-700 rounded-full px-6 py-3 block text-center font-medium hover:bg-gray-200 transition-colors">All Countries</a>
                            </div>
                        </div>

                        <!-- Random Person -->
                        <div class="feature-card rounded-3xl p-8 lg:p-10">
                            <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-8">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl lg:text-3xl font-light text-gray-900 mb-4">Random Person</h2>
                            <p class="text-gray-600 mb-8 leading-relaxed">Create realistic personal profiles with names, dates, and demographic information.</p>
                            <div class="space-y-3">
                                <a href="<?php echo base_url();?>random-person" class="btn-primary text-white rounded-full px-6 py-3 block text-center font-medium">Generate Person</a>
                            </div>
                        </div>

                        <!-- Random Credit Card -->
                        <div class="feature-card rounded-3xl p-8 lg:p-10">
                            <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mb-8">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl lg:text-3xl font-light text-gray-900 mb-4">Random Credit Card</h2>
                            <p class="text-gray-600 mb-8 leading-relaxed">Generate test payment card numbers for development and testing environments.</p>
                            <div class="space-y-3">
                                <a href="<?php echo base_url();?>random-credit-card" class="btn-primary text-white rounded-full px-6 py-3 block text-center font-medium">Generate Card</a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section class="bg-white py-20 lg:py-32">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-4xl mx-auto text-center">
                        <h2 class="text-4xl lg:text-5xl font-light text-gradient mb-12">Why RandomAddress?</h2>
                        <p class="text-xl text-gray-600 leading-relaxed font-light">
                            RandomAddress provides professional-grade random data generation tools designed for developers, 
                            researchers, and businesses. Our commitment to quality, reliability, and user experience 
                            makes us the trusted choice for random data needs.
                        </p>
                    </div>
                </div>
            </section>
        </main>

        <?php echo $footer; ?>
    </div>
</body>
</html> 