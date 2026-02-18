<?php
/**
 * Template Name: Contact Us
 */

get_header(); ?>


    <!-- First Two section e.g hero and result -->
     
        <!-- Hero section  -->
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-start py-16">

            <div class="space-y-12">
                <div>
                    <h2 class="reveal-type text-5xl font-serif text-[#1a1a1a] mb-6">Kontakt oss</h2>
                    <p class="reveal-type text-gray-600 text-lg">Ring oss på +47 41 21 44 57 eller bruk kontaktskjemaet.
                    </p>
                </div>

                <div class="reveal-grid space-y-8">
                    <div class="reveal-card border-t border-gray-200 pt-6">
                        <p class="text-sm text-gray-500 mb-1">Daglig leder, Wenche Sandlie</p>
                        <a href="mailto:wenche.sandlie@spidersolutions.no"
                            class="text-lg text-[#1a1a1a] underline underline-offset-4 hover:opacity-70 transition-opacity">
                            wenche.sandlie@spidersolutions.no / +47 41 21 44 58
                        </a>
                    </div>

                    <div class="reveal-card border-t border-gray-200 pt-6">
                        <p class="text-sm text-gray-500 mb-1">Produktansvarlig/kundekontakt, Bjørn Sigurd Benestad
                            Johansen</p>
                        <a href="mailto:bjorn.sigurd.johansen@spidersolutions.no"
                            class="text-lg text-[#1a1a1a] underline underline-offset-4 hover:opacity-70 transition-opacity">
                            bjorn.sigurd.johansen@spidersolutions.no / +47 41 21 44 57
                        </a>
                    </div>

                    <div class="reveal-card border-t border-gray-200 pt-6">
                        <p class="text-sm text-gray-500 mb-1">Support/service</p>
                        <a href="mailto:support@spidersolutions.no"
                            class="text-lg text-[#1a1a1a] underline underline-offset-4 hover:opacity-70 transition-opacity">
                            support@spidersolutions.no
                        </a>
                    </div>

                    <div class="reveal-card border-t border-gray-200 pt-6">
                        <p class="text-sm text-gray-500 mb-1">Informasjon</p>
                        <a href="mailto:info@spidersolutions.no"
                            class="text-lg text-[#1a1a1a] underline underline-offset-4 hover:opacity-70 transition-opacity">
                            info@spidersolutions.no
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[1rem] p-8 md:p-12 shadow-[0_40px_80px_-15px_rgba(0,0,0,0.08)]"
                x-data="spiderContactFormData">

                <h3 class="text-2xl font-serif mb-8 text-[#1a1a1a]">Kontaktskjema</h3>

                <div x-show="success" x-transition
                    class="mb-6 p-4 bg-green-50 text-green-700 rounded-xl border border-green-200">
                    Takk! Meldingen din er sendt.
                </div>

                <form @submit.prevent="submitForm" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-medium">Navn <span class="text-orange-400">*</span></label>
                            <input type="text" x-model="formData.name"
                                :class="errors.name ? 'border-red-500 ring-1 ring-red-100' : 'border-gray-200'"
                                class="w-full px-4 py-3 rounded-xl border focus:outline-none focus:ring-2 focus:ring-blue-100 transition-all">
                            <p x-show="errors.name" x-text="errors.name" class="text-xs text-red-500 mt-1"></p>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium">E-post <span class="text-orange-400">*</span></label>
                            <input type="email" x-model="formData.email"
                                :class="errors.email ? 'border-red-500 ring-1 ring-red-100' : 'border-gray-200'"
                                class="w-full px-4 py-3 rounded-xl border focus:outline-none focus:ring-2 focus:ring-blue-100 transition-all">
                            <p x-show="errors.email" x-text="errors.email" class="text-xs text-red-500 mt-1"></p>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium">Emne</label>
                        <input type="text" x-model="formData.subject"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-100 transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium">Melding</label>
                        <textarea rows="4" x-model="formData.message"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-100 transition-all resize-none"></textarea>
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-start gap-3">
                            <input type="checkbox" id="privacy" x-model="formData.privacy"
                                class="mt-1 w-5 h-5 rounded border-gray-300">
                            <label for="privacy" class="text-sm text-gray-500 leading-snug">
                                Jeg samtykker til at opplysningene behandles i samsvar med vår personvernerklæring.
                                <span class="text-orange-400">*</span>
                            </label>
                        </div>
                        <p x-show="errors.privacy" x-text="errors.privacy" class="text-xs text-red-500 mt-1"></p>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" required class="w-6 h-6">
                            <span class="text-sm">Jeg er ikke en robot</span>
                        </div>
                        <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA"
                            class="w-8 h-8 opacity-70">
                    </div>

                    <button type="submit" :disabled="loading"
                        class="w-full bg-[#111] text-white py-4 rounded-full font-medium text-lg hover:bg-black transition-all flex items-center justify-center gap-2">
                        <span x-show="!loading">Send</span>
                        <span x-show="loading" class="flex items-center gap-2">
                            <svg class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Sender...
                        </span>
                    </button>
                </form>
            </div>

        </div>
        <!-- Hero section ends  -->
    </div>
    <!-- First Two section e.g hero and result -->




<?php get_footer(); ?>