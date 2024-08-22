<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom animations */
        @media (max-width: 768px) {
            .animate-width-change {
                transition: transform 0.5s ease-in-out, background-color 0.5s ease-in-out;
                transform: scale(1.05);
                background-color: #f7fafc;
            }
        }
        @media (min-width: 769px) {
            .animate-width-change {
                transition: transform 0.5s ease-in-out, background-color 0.5s ease-in-out;
                transform: scale(1);
                background-color: #ffffff;
            }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <?php include "header.php"; ?>
    <div style="margin-top: 4rem;">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-xl mx-auto bg-white p-8 shadow-lg rounded-lg animate-width-change hover:shadow-xl hover:bg-blue-50">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Personal Information</h2>
            <form class="space-y-6">
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Social Title</label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="social-title" value="Mr." class="form-radio text-blue-500">
                            <span class="ml-2 text-gray-600">Mr.</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="social-title" value="Mrs." class="form-radio text-blue-500">
                            <span class="ml-2 text-gray-600">Mrs.</span>
                        </label>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="first-name" class="block text-gray-700 font-medium mb-2">First Name</label>
                    <input type="text" id="first-name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="First Name" required>
                </div>

                <div class="mb-6">
                    <label for="last-name" class="block text-gray-700 font-medium mb-2">Last Name</label>
                    <input type="text" id="last-name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Last Name" required>
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Email" required>
                </div>

                <div class="mb-6 relative">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <input type="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Password" required>
                    <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-gray-300 hover:bg-gray-400 px-3 py-1 rounded cursor-pointer text-sm font-medium transition-all duration-300" onclick="togglePassword('password')">SHOW</button>
                </div>

                <div class="mb-6 relative">
                    <label for="new-password" class="block text-gray-700 font-medium mb-2">New Password (Optional)</label>
                    <input type="password" id="new-password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="New Password">
                    <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-gray-300 hover:bg-gray-400 px-3 py-1 rounded cursor-pointer text-sm font-medium transition-all duration-300" onclick="togglePassword('new-password')">SHOW</button>
                </div>

                <div class="mb-6">
                    <label for="birthdate" class="block text-gray-700 font-medium mb-2">Birthdate (Optional)</label>
                    <input type="date" id="birthdate" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="MM/DD/YYYY">
                </div>

                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" id="offers" class="form-checkbox text-blue-500">
                        <span class="ml-2 text-gray-600">Receive offers from our partners</span>
                    </label>
                </div>

                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" id="privacy" class="form-checkbox text-blue-500" checked disabled>
                        <span class="ml-2 text-gray-600">Customer data privacy</span>
                    </label>
                    <p class="text-sm text-gray-500 mt-2">
                        The personal data you provide is used to answer queries, process orders, or allow access to specific information. 
                        You have the right to modify and delete all the personal information found on the "My Account" page.
                    </p>
                </div>

                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" id="newsletter" class="form-checkbox text-blue-500">
                        <span class="ml-2 text-gray-600">Sign up for our newsletter</span>
                    </label>
                </div>

                <div class="mb-8">
                    <label class="inline-flex items-center">
                        <input type="checkbox" id="terms" class="form-checkbox text-blue-500" required>
                        <span class="ml-2 text-gray-600">I agree to the terms and conditions and the privacy policy</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300">Save</button>
            </form>
        </div>
    </div>
    </div>
    <div class="mt-8">
        <?php include './Footer.php'; ?>
    </div>
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        }
    </script>
</body>
</html>