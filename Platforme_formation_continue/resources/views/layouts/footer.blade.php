<footer class="relative mt-[-1px]" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    
    {{-- Curved top using SVG --}}
    <div
        class="absolute top-0 left-0 w-full overflow-hidden"
        style="height: 80px; transform: translateY(-99.5%);"
        aria-hidden="true"
    >
        <svg
            class="absolute bottom-0 w-full h-full block"
            viewBox="0 0 1440 80"
            preserveAspectRatio="none"
        >
            <path d="M0,80 C360,0 1080,0 1440,80 V80 H0 V0 Z" fill="#54E0FC" />
        </svg>
    </div>

    <div class="bg-[#54E0FC] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-gray-800">
                {{-- Address Section --}}
                <div class="space-y-4">
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <address class="not-italic space-y-3">
                        <p class="flex items-start text-gray-800">
                            <i class="fa-solid fa-location-dot mr-2 mt-1 flex-shrink-0"></i>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                        </p>
                        <p class="flex items-center text-gray-800">
                            <i class="fa-solid fa-phone mr-2 flex-shrink-0"></i>
                            <span>Tel: 
                                <a
                                    href="tel:+9239341037"
                                    class="hover:text-blue-800 transition-colors underline"
                                    aria-label="Call us at +92 393 410 37"
                                >
                                    +92 393 410 37
                                </a>
                            </span>
                        </p>
                        <p class="flex items-center text-gray-800">
                            <i class="fa-solid fa-envelope mr-2 flex-shrink-0"></i>
                            <span>Email: 
                                <a
                                    href="mailto:info@onlearn.com"
                                    class="hover:text-blue-800 transition-colors underline"
                                    aria-label="Email us at info@onlearn.com"
                                >
                                    info@onlearn.com
                                </a>
                            </span>
                        </p>
                    </address>
                </div>

                {{-- Social Networks --}}
                <div class="space-y-4">
                    <h3 class="text-lg font-bold mb-4">Connect With Us</h3>
                    <ul class="flex flex-col space-y-3 list-none p-0">
                        <li>
                            <a
                                href="https://facebook.com/onlearn"
                                class="flex items-center text-gray-800 hover:text-blue-800 transition-colors group"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Follow us on Facebook"
                            >
                                <i class="fa-brands fa-facebook-f mr-2 text-gray-800 group-hover:text-blue-800 transition-colors"></i>
                                Facebook
                            </a>
                        </li>
                        <li>
                            <a
                                href="https://instagram.com/onlearn"
                                class="flex items-center text-gray-800 hover:text-blue-800 transition-colors group"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Follow us on Instagram"
                            >
                                <i class="fa-brands fa-instagram mr-2 text-gray-800 group-hover:text-blue-800 transition-colors"></i>
                                Instagram
                            </a>
                        </li>
                        <li>
                            <a
                                href="https://linkedin.com/company/onlearn"
                                class="flex items-center text-gray-800 hover:text-blue-800 transition-colors group"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Follow us on LinkedIn"
                            >
                                <i class="fa-brands fa-linkedin-in mr-2 text-gray-800 group-hover:text-blue-800 transition-colors"></i>
                                LinkedIn
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Quick Links --}}
                <div class="space-y-4">
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <nav aria-label="Footer Navigation">
                        <ul class="flex flex-col space-y-3 list-none p-0">
                            <li>
                                <a
                                    href="{{ route('formations') }}"
                                    class="text-gray-800 hover:text-blue-800 transition-colors"
                                >
                                    Courses
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('plans') }}"
                                    class="text-gray-800 hover:text-blue-800 transition-colors"
                                >
                                    Learning Packs
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('about') }}"
                                    class="text-gray-800 hover:text-blue-800 transition-colors"
                                >
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-gray-800 hover:text-blue-800 transition-colors"
                                >
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-gray-800 hover:text-blue-800 transition-colors"
                                >
                                    Privacy Policy
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                {{-- Newsletter --}}
                <div class="space-y-4">
                    <h3 class="text-lg font-bold mb-4">
                        Stay Updated
                    </h3>
                    <p class="text-gray-800 mb-4">Subscribe to receive updates about new courses and learning opportunities.</p>
                    <form class="space-y-2" action="#" method="POST">
                        @csrf
                        <div class="bg-white rounded-full overflow-hidden shadow-md flex items-center p-1 max-w-full">
                            <input
                                type="email"
                                name="email"
                                placeholder="Your email address"
                                class="flex-1 min-w-0 px-4 py-2 bg-transparent border-none focus:outline-none text-gray-700"
                                aria-label="Email address for newsletter"
                                required
                            />
                            <button
                                type="submit"
                                class="px-4 sm:px-6 py-2 bg-teal-700 hover:bg-teal-800 text-white rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 flex-shrink-0 whitespace-nowrap"
                                aria-label="Subscribe to newsletter"
                            >
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Copyright and Additional Links --}}
            <div class="mt-12 pt-6 border-t border-gray-200/30">
                <div class="flex flex-col md:flex-row justify-between items-center text-gray-800">
                    <p>&copy; {{ date('Y') }} OnLearn. All rights reserved.</p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-gray-800 hover:text-blue-800 transition-colors text-sm">
                            Terms of Service
                        </a>
                        <a href="#" class="text-gray-800 hover:text-blue-800 transition-colors text-sm">
                            Privacy Policy
                        </a>
                        <a href="#" class="text-gray-800 hover:text-blue-800 transition-colors text-sm">
                            Cookie Policy
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>