<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portfolio - Vintage Experience</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-stone-50 text-slate-800 font-sans overflow-x-hidden selection:bg-indigo-100">
        
        <!-- Main Scrollable Container -->
        <main class="relative">
            
            <!-- Hero Section -->
            <section id="hero" class="relative min-h-screen flex items-center overflow-hidden">
                <!-- Background Image Layer -->
                <div class="absolute inset-0 z-0">
                    <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&q=80&w=2000" alt="Landscape" class="w-full h-full object-cover filter brightness-90" />
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/20 to-stone-50"></div>
                </div>

                <!-- Content Container -->
                <div class="container mx-auto px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-12 pt-20">
                    <!-- Text Content -->
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-6xl md:text-8xl font-serif font-black text-slate-900 mb-6 leading-tight drop-shadow-md">
                            My Own <br/> <span class="text-indigo-600 italic">Portfolio Page.</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-slate-700 max-w-lg mb-8 font-medium">
                            Hii do you like my portfolio page.
                        </p>
                        <a href="#camera-anchor" class="inline-flex items-center px-8 py-4 bg-slate-900 text-white rounded-full font-bold text-lg hover:bg-indigo-600 transition-all duration-300 shadow-xl hover:-translate-y-1">
                            Start Exploring
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                        </a>
                    </div>

                    <!-- Character Placeholder -->
                    <div class="flex-1 flex justify-center md:justify-end relative">
                        <div class="relative w-72 h-72 sm:w-96 sm:h-96 md:w-[450px] md:h-[600px] rounded-2xl overflow-hidden shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-700 group">
                            <img src="https://cdn.cara.app/production/posts/c1f3dc8b-89b2-4e61-9d28-668523406146/octopie-z5IAkX-GWwEkeEnc1dylr-0B2C4F4B-6509-40D5-BE14-D5F2959C519E.jpg" alt="Character" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                            <div class="absolute inset-0 ring-1 ring-inset ring-white/20 rounded-2xl"></div>
                        </div>
                        <!-- Decorative Elements -->
                        <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-indigo-500/20 blur-3xl rounded-full"></div>
                        <div class="absolute -top-6 -right-6 w-32 h-32 bg-pink-500/20 blur-3xl rounded-full"></div>
                    </div>
                </div>
            </section>

            <div id="camera-anchor" class="h-24"></div>

            <!-- Camera Section -->
            <section id="camera-section" class="relative min-h-screen flex flex-col items-center justify-center py-20 z-20">
                <div id="camera-container" class="relative transition-all duration-[1500ms] ease-in-out cursor-pointer group">
                    <!-- The Vintage Camera (Built with CSS) -->
                    <div id="camera-trigger" class="relative w-64 h-48 sm:w-80 sm:h-56 bg-slate-800 rounded-xl shadow-[0_30px_60px_-15px_rgba(0,0,0,0.5)] flex flex-col items-center justify-center border-b-[10px] border-slate-900 group-hover:scale-105 transition-transform duration-500">
                        <!-- Top Chrome Bar -->
                        <div class="absolute top-0 inset-x-0 h-4 bg-slate-700 rounded-t-xl border-b border-slate-900/50"></div>
                        
                        <!-- Viewfinder -->
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-20 h-10 bg-slate-800 rounded-t-lg border-x-[8px] border-t-[8px] border-slate-900 flex items-center justify-center">
                            <div class="w-12 h-4 bg-slate-950 rounded shadow-inner"></div>
                        </div>

                        <!-- Shutter Button -->
                        <div class="absolute -top-4 right-8 w-10 h-6 bg-slate-700 rounded-md border-b-4 border-slate-900 active:translate-y-1 transition-transform">
                            <div class="absolute inset-x-2 top-1 h-1 bg-red-500/50 rounded-full animate-pulse"></div>
                        </div>

                        <!-- Flash -->
                        <div class="absolute top-4 left-8 w-12 h-8 bg-slate-200/20 rounded border border-white/10 backdrop-blur-sm"></div>

                        <!-- Lens (The big round part) -->
                        <div class="relative w-32 h-32 sm:w-40 sm:h-40 rounded-full border-[10px] border-slate-900 bg-slate-950 shadow-[inset_0_10px_20px_rgba(0,0,0,0.8)] flex items-center justify-center">
                            <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-full border-4 border-slate-800 bg-gradient-to-br from-slate-700 to-slate-950 flex items-center justify-center overflow-hidden">
                                <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-full bg-slate-900 shadow-inner relative">
                                    <div class="absolute top-2 left-3 w-6 h-6 bg-white/10 rounded-full blur-[2px]"></div>
                                    <div class="absolute bottom-4 right-4 w-2 h-2 bg-indigo-500/30 rounded-full"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Branding -->
                        <div class="absolute bottom-4 left-6 text-[10px] font-bold tracking-[0.2em] text-slate-500 uppercase">kaii</div>
                    </div>

                    <!-- Instruction Text -->
                    <div id="camera-label" class="mt-12 text-center opacity-80 group-hover:opacity-100 transition-opacity">
                        <p class="text-sm font-semibold tracking-widest uppercase mb-2">Ready to snap</p>
                        <h3 class="text-3xl font-serif font-bold text-slate-900">Click to reveal memories</h3>
                    </div>
                </div>
            </section>

            <!-- Polaroids Scatter Section -->
            <div id="polaroids-section" class="fixed inset-0 hidden z-30 overflow-hidden pointer-events-none transition-all duration-500 opacity-0 blur-md">
                <!-- Back Button -->
                <button id="reset-camera" class="fixed top-8 left-8 z-50 pointer-events-auto flex items-center gap-2 px-6 py-3 bg-white shadow-2xl rounded-full font-bold text-slate-900 hover:bg-indigo-600 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Camera
                </button>

                <div class="relative w-full h-full flex items-center justify-center perspective-[1500px]">
                    <!-- Polaroid 1 -->
                    <div class="polaroid-card absolute top-[50%] pointer-events-auto cursor-pointer" data-id="1">
                        <div class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                            <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                                <img src=https://cdn.cara.app/production/posts/c069dbe2-612a-469e-8ff4-23e1f5d85cc2/11648B0B-F053-430B-BFBB-51C05CC56EC5.jpg-rAJE4k3Maf9C_VVaH_Vmz-11648B0B-F053-430B-BFBB-51C05CC56EC5.jpg class="w-full h-full object-cover" alt="City Street" />
                            </div>
                            <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[-2deg]">City Lights</p>
                        </div>
                    </div>

                    <!-- Polaroid 2 -->
                    <div class="polaroid-card absolute top-[50%] pointer-events-auto cursor-pointer" data-id="2">
                        <div class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                            <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                                <img src=https://cdn.cara.app/production/posts/1625e6d3-1d5b-4fd0-ac9b-8ad3610f5817/50FF2D67-FA49-4A78-AFCE-B1E67B5DA1A1.jpg-SlDjHqgG04pGJIuO78-R3-50FF2D67-FA49-4A78-AFCE-B1E67B5DA1A1.jpg class="w-full h-full object-cover" alt="Serene Beach" />
                            </div>
                            <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[3deg]">Ocean Breeze</p>
                        </div>
                    </div>

                    <!-- Polaroid 3 -->
                    <div class="polaroid-card absolute top-[50%] pointer-events-auto cursor-pointer" data-id="3">
                        <div class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                            <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                                <img src=https://cdn.cara.app/production/posts/c1f3dc8b-89b2-4e61-9d28-668523406146/octopie-NwbLQn2r5VnHs5JsuTUzj-5D5A07B7-D2B4-435B-AC15-EC939E2F3471.jpg class="w-full h-full object-cover" alt="Cozy Cafe" />
                            </div>
                            <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[1deg]">Morning Brew</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expanded Polaroid Modal -->
            <div id="expanded-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-white/90 backdrop-blur-md opacity-0 pointer-events-none transition-opacity duration-500">
                <button id="close-modal" class="absolute top-8 right-8 w-12 h-12 bg-slate-900 text-white rounded-full flex items-center justify-center hover:bg-indigo-600 hover:rotate-90 transition-all duration-300 shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <div class="flex flex-col md:flex-row items-center justify-center gap-12 p-8 max-w-6xl w-full">
                    <!-- Expanded Image Container -->
                    <div id="modal-image-container" class="bg-white p-6 pb-24 shadow-[0_40px_100px_rgba(0,0,0,0.4)] rounded-sm transform scale-90 transition-transform duration-700">
                        <div class="w-72 h-72 sm:w-[450px] sm:h-[450px] bg-slate-200 border border-slate-100 overflow-hidden">
                            <img id="modal-image" src="" class="w-full h-full object-cover" alt="" />
                        </div>
                        <p id="modal-caption" class="text-center mt-10 font-handwriting text-4xl text-slate-800"></p>
                    </div>

                    <!-- Explanation / Info -->
                    <div id="modal-info" class="flex-1 opacity-0 translate-x-8 transition-all duration-700 delay-300 max-w-lg">
                        <h2 id="modal-title" class="text-5xl md:text-7xl font-serif font-black text-slate-900 mb-6 border-b-8 border-indigo-500/30 pb-4">Project Title</h2>
                        <p id="modal-desc" class="text-xl text-slate-700 leading-relaxed font-medium mb-8">
                            This is a detailed explanation of the captured moment. It describes the feelings, the atmosphere, and the memories associated with this photograph.
                        </p>
                        
                        <a href="#" class="inline-flex items-center text-indigo-600 font-bold text-xl group hover:text-indigo-800 transition-colors">
                            Explore full project 
                            <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

        </main>

    </body>
</html>

