<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="index.html" class="text-white text-xl font-semibold hover:text-gray-300">Anmol Shrestha</a>
    </div>

    <hr class="mb-5">

    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ route('home') }}" class="flex items-center text-white py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>

        <a href="{{ route('hostel') }}" class="flex items-center text-white py-4 pl-6 nav-item">
            <i class="fas fa-solid fa-hotel mr-3"></i>
            Hostel
        </a>
    </nav>
</aside>
