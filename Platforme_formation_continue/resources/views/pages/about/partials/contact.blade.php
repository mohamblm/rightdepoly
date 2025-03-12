<!-- resources/views/partials/contact-us.blade.php -->
<section class="py-16 bg-white overflow-hidden" id="contact-us">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center">
            <!-- Left side with image -->
            <div class="w-full lg:w-1/2 mb-12 lg:mb-0 relative">
                <div class="relative z-10 transform transition-transform duration-500 hover:scale-105">
                    <img 
                        src="{{ asset('images/about-contact.png') }}" 
                        alt="Contact Us" 
                        class="w-full"
                    >
                </div>
                <!-- Decorative elements -->
                <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-cyan-300 rounded-full opacity-30 animate-pulse"></div>
                <div class="absolute top-10 -right-4 w-16 h-16 bg-yellow-400 rounded-full opacity-30 animate-pulse" style="animation-delay: 0.5s"></div>
                <div class="absolute bottom-20 right-10 w-12 h-12 bg-purple-400 rounded-full opacity-30 animate-pulse" style="animation-delay: 0.5s"></div>
            </div>
            
            <!-- Right side with form -->
            <div class="w-full lg:w-1/2 lg:pl-16">
                <div class="max-w-md mx-auto">
                    <div class="mb-10">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Contactez-Nous</h2>
                        <div class="w-20 h-1 bg-cyan-600"></div>
                        <p class="mt-4 text-gray-600">Nous sommes là pour répondre à toutes vos questions. N'hésitez pas à nous contacter.</p>
                    </div>
                    
                    <form class="space-y-6">
                        <div class="group">
                            <div class="relative overflow-hidden border-b-2 focus-within:border-cyan-600 transition-colors duration-300">
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    class="block w-full py-3 px-2 text-gray-700 bg-transparent appearance-none focus:outline-none"
                                    required 
                                />
                                <label 
                                    for="name" 
                                    class="absolute top-0 -z-1 duration-300 origin-0"
                                    :class="{'text-sm': formData.name, 'transform -translate-y-6': formData.name}"
                                >
                                    Nom Complet
                                </label>
                            </div>
                        </div>
                        
                        <div class="group">
                            <div class="relative overflow-hidden border-b-2 focus-within:border-cyan-600 transition-colors duration-300">
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="block w-full py-3 px-2 text-gray-700 bg-transparent appearance-none focus:outline-none"
                                    required 
                                />
                                <label 
                                    for="email" 
                                    class="absolute top-0 -z-1 duration-300 origin-0"
                                >
                                    Email
                                </label>
                            </div>
                        </div>
                        
                        <div class="group">
                            <div class="relative overflow-hidden border-b-2 focus-within:border-cyan-600 transition-colors duration-300">
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone" 
                                    class="block w-full py-3 px-2 text-gray-700 bg-transparent appearance-none focus:outline-none"
                                    required 
                                />
                                <label 
                                    for="phone" 
                                    class="absolute top-0 -z-1 duration-300 origin-0"
                                >
                                    Téléphone
                                </label>
                            </div>
                        </div>
                        
                        <div class="group">
                            <div class="relative overflow-hidden border-b-2 focus-within:border-cyan-600 transition-colors duration-300">
                                <textarea 
                                    id="message" 
                                    name="message" 
                                    rows="4" 
                                    class="block w-full py-3 px-2 text-gray-700 bg-transparent appearance-none focus:outline-none resize-none"
                                    required
                                ></textarea>
                                <label 
                                    for="message" 
                                    class="absolute top-0 -z-1 duration-300 origin-0"
                                >
                                    Votre Message
                                </label>
                            </div>
                        </div>
                        
                        <div class="pt-4">
                            <button 
                                type="submit" 
                                class="px-6 py-3 bg-cyan-600 text-white font-medium rounded-lg shadow-lg hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-50 transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl w-full"
                            >
                                Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add this script at the end of your layout file or inline -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add animation to inputs when focused
        const inputs = document.querySelectorAll('input, textarea');
        
        inputs.forEach(input => {
            // Initial state check
            if (input.value) {
                input.previousElementSibling.classList.add('text-sm', 'text-cyan-600', '-translate-y-6');
            }
            
            // Focus event
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('border-cyan-600');
                const label = this.previousElementSibling || this.parentElement.querySelector('label');
                label.classList.add('text-sm', 'text-cyan-600', '-translate-y-6');
            });
            
            // Blur event
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('border-cyan-600');
                const label = this.previousElementSibling || this.parentElement.querySelector('label');
                
                if (!this.value) {
                    label.classList.remove('text-sm', 'text-cyan-600', '-translate-y-6');
                } else {
                    label.classList.remove('text-cyan-600');
                }
            });
            
            // Input event
            input.addEventListener('input', function() {
                const label = this.previousElementSibling || this.parentElement.querySelector('label');
                
                if (this.value) {
                    label.classList.add('text-sm', '-translate-y-6');
                } else {
                    label.classList.remove('text-sm', '-translate-y-6');
                }
            });
        });
    });
</script>