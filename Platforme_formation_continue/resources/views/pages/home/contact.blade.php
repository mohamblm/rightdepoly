<!-- contact.blade.php -->
<section class="bg-white py-12">
    <div class="container mx-auto px-4 py-12 max-w-6xl">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 relative inline-block pb-3">
                CONTACTEZ-NOUS
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-500"></span>
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row rounded-lg overflow-hidden shadow-xl">
            <!-- Map Section -->
            <div class="lg:w-1/2 h-96 lg:h-auto relative">
                <!-- Replace YOUR_GOOGLE_MAPS_API_KEY with your actual API key -->
                <iframe
                    class="absolute inset-0 w-full h-full"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3370.449360339618!2d-6.341341924930311!3d32.353488973843454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda38748814f4add%3A0xf5145d3b984026e!2sBeni%20Mellal%20IFMSAS!5e0!3m2!1sen!2sma!4v1741895507722!5m2!1sen!2sma"
                    frameborder="0"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
                <!-- Map Controls Overlay -->
                <div class="absolute bottom-4 left-4 z-10">
                    <button class="bg-white p-2 rounded-full shadow-md text-gray-700 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="bg-white p-2 rounded-full shadow-md text-gray-700 hover:bg-gray-100 ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="lg:w-1/2 bg-white p-6 md:p-8">
                <div class="mb-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Get in touch</h3>
                    <p class="text-gray-600 mt-2">We are here for you! How can we help?</p>
                </div>

                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom Complet</label>
                        <input type="text" id="name" name="name" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea id="message" name="message" rows="4" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"></textarea>
                    </div>

                    <div>
                        <button type="submit" 
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition duration-300 ease-in-out">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>