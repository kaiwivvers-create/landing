<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portfolio - Polaroid Experience</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-b from-[#ccccff] to-white min-h-screen text-slate-800 font-sans overflow-hidden">
        
        <!-- Camera Section (Front Page) -->
        <div id="camera-section" class="absolute inset-0 flex flex-col items-center justify-center transition-transform duration-[1500ms] ease-in-out z-20">
            
            <!-- The wide background image (fills left to right, fixed height) -->
            <div class="relative w-full h-[400px] sm:h-[500px] overflow-hidden flex items-center justify-center shadow-2xl z-10 group cursor-pointer" id="camera-trigger">
                <!-- Background Image layer -->
                <img src="{{ asset('images/camera_bg.png') }}" alt="Background" class="absolute inset-0 w-full h-full object-cover filter brightness-[0.85] group-hover:brightness-100 transition-all duration-500" />
                
                <!-- Inner Camera Rectangle (Polaroid Lens) -->
                <div class="relative w-48 h-48 sm:w-64 sm:h-64 rounded-full border-[12px] border-slate-900 bg-black/40 backdrop-blur-md shadow-[inset_0_10px_20px_rgba(0,0,0,0.5),0_10px_30px_rgba(0,0,0,0.5)] flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                    <div class="w-32 h-32 sm:w-44 sm:h-44 rounded-full border-4 border-slate-800 bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center shadow-inner">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-slate-900 shadow-[inset_0_2px_10px_rgba(255,255,255,0.2)] relative">
                            <!-- lens flare -->
                            <div class="absolute top-2 left-3 w-4 h-4 bg-white/30 rounded-full blur-[1px]"></div>
                        </div>
                    </div>
                    
                    <div class="absolute -top-3 right-4 w-6 h-6 rounded-full bg-red-500 shadow-md border-2 border-slate-900"></div>
                </div>
            </div>

            <!-- Title and Subtext underneath -->
            <div class="mt-12 text-center z-10">
                <h1 class="text-5xl sm:text-7xl font-bold tracking-tight text-slate-900 mb-4 drop-shadow-sm">Capture Moments</h1>
                <p class="text-xl sm:text-2xl text-slate-700 font-medium max-w-xl mx-auto px-4">Click the camera to reveal the memories captured inside.</p>
            </div>
            
            <!-- Instructions -->
            <div class="absolute bottom-8 animate-bounce opacity-70 flex flex-col items-center">
                <svg class="w-6 h-6 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                <p class="text-sm font-semibold tracking-widest uppercase">Click camera to snap</p>
            </div>
        </div>

        <!-- Polaroids Scatter Section (Hidden initially, animates in) -->
        <div id="polaroids-section" class="absolute inset-0 hidden pointer-events-none z-10 overflow-hidden">
            <!-- Polaroids container -->
            <div class="relative w-full h-full flex items-center justify-center perspective-[1000px]">
                
                <!-- Polaroid 1 -->
                <div class="polaroid-card absolute top-[50%] pointer-events-auto transform transition-all duration-700 cursor-pointer hover:z-30 hover:scale-105" data-id="1">
                    <div class="bg-white p-4 pb-16 shadow-[0_20px_50px_rgba(0,0,0,0.3)] rounded-sm">
                        <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                            <img src="{{ asset('images/polaroid_1.png') }}" class="w-full h-full object-cover" alt="City Street" />
                        </div>
                        <p class="text-center mt-6 font-handwriting text-xl text-slate-800 tracking-wide rotate-[-2deg]">City Lights</p>
                    </div>
                </div>

                <!-- Polaroid 2 -->
                <div class="polaroid-card absolute top-[50%] pointer-events-auto transform transition-all duration-700 cursor-pointer hover:z-30 hover:scale-105" data-id="2">
                    <div class="bg-white p-4 pb-16 shadow-[0_20px_50px_rgba(0,0,0,0.3)] rounded-sm">
                        <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                            <img src="{{ asset('images/polaroid_2.png') }}" class="w-full h-full object-cover" alt="Serene Beach" />
                        </div>
                        <p class="text-center mt-6 font-handwriting text-xl text-slate-800 tracking-wide rotate-[3deg]">Ocean Breeze</p>
                    </div>
                </div>

                <!-- Polaroid 3 -->
                <div class="polaroid-card absolute top-[50%] pointer-events-auto transform transition-all duration-700 cursor-pointer hover:z-30 hover:scale-105" data-id="3">
                    <div class="bg-white p-4 pb-16 shadow-[0_20px_50px_rgba(0,0,0,0.3)] rounded-sm">
                        <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                            <img src="{{ asset('images/polaroid_3.png') }}" class="w-full h-full object-cover" alt="Cozy Cafe" />
                        </div>
                        <p class="text-center mt-6 font-handwriting text-xl text-slate-800 tracking-wide rotate-[1deg]">Morning Brew</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Expanded Polaroid Modal -->
        <div id="expanded-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-white/80 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-500">
            <button id="close-modal" class="absolute top-8 right-8 w-12 h-12 bg-slate-900 text-white rounded-full flex items-center justify-center hover:bg-slate-700 hover:rotate-90 transition-all duration-300 shadow-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="flex flex-col md:flex-row items-center justify-center gap-12 p-8 max-w-6xl w-full">
                <!-- Expanded Image Container -->
                <div id="modal-image-container" class="bg-white p-6 pb-20 shadow-[0_30px_60px_rgba(0,0,0,0.4)] rounded-sm transform scale-90 transition-transform duration-700">
                    <div class="w-64 h-64 sm:w-96 sm:h-96 bg-slate-200 border border-slate-100 overflow-hidden">
                        <img id="modal-image" src="" class="w-full h-full object-cover" alt="" />
                    </div>
                    <p id="modal-caption" class="text-center mt-8 font-handwriting text-3xl text-slate-800"></p>
                </div>

                <!-- Explanation / Info -->
                <div id="modal-info" class="flex-1 opacity-0 translate-x-8 transition-all duration-700 delay-300">
                    <a href="#" class="inline-block hover:opacity-80 transition-opacity">
                        <h2 id="modal-title" class="text-4xl sm:text-6xl font-bold text-slate-900 mb-6 border-b-4 border-indigo-500 pb-2 cursor-pointer">Project Title</h2>
                    </a>
                    <p id="modal-desc" class="text-lg sm:text-xl text-slate-700 leading-relaxed font-medium">
                        This is a detailed explanation of the captured moment. It describes the feelings, the atmosphere, and the memories associated with this photograph. Click the title above to view the full project.
                    </p>
                    
                    <a href="#" class="mt-8 inline-flex items-center text-indigo-600 font-semibold text-lg hover:text-indigo-800 transition-colors">
                        Read more 
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>

    </body>
</html>
